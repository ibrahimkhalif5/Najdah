<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    protected array $spamKeywords = [
        'http://', 'https://', 'www.', 'click here', 'buy now',
        'free money', 'earn money', ' casino', 'lottery', 'winner',
        'viagra', 'cryptocurrency', 'bitcoin', 'XXX', 'sexy',
    ];

    public function message(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:question,feedback,general',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
            'honeypot' => 'present|max:0',
            'cf-turnstile-response' => 'required|string',
        ]);

        $turnstileResponse = $request->input('cf-turnstile-response');
        $turnstileSecret = config('services.turnstile.secret_key');

        $verification = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => $turnstileSecret,
            'response' => $turnstileResponse,
            'remoteip' => $request->ip(),
        ]);

        if (!$verification->json('success')) {
            return back()->withErrors(['cf-turnstile-response' => __('massages.turnstile_error')])
                ->withInput();
        }

        if ($this->isSpam($validated)) {
            Message::create([
                'type' => $validated['type'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'is_spam' => true,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return back()->with('success', __('massages.thank_you'));
        }

        Message::create([
            'type' => $validated['type'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', __('massages.thank_you'));
    }

    protected function isSpam(array $data): bool
    {
        $haystack = mb_strtolower($data['name'] . ' ' . $data['subject'] . ' ' . $data['message']);

        foreach ($this->spamKeywords as $keyword) {
            if (str_contains($haystack, mb_strtolower($keyword))) {
                return true;
            }
        }

        return false;
    }
}
