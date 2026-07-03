<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function members()
    {
        $members = Member::orderBy('sort_order')->get();
        return view('pages.members', compact('members'));
    }
}
