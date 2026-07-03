<?php

namespace App\Filament\Pages;

use App\Models\WebsiteSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 3;

    public array $data = [];

    public function mount(): void
    {
        $settings = WebsiteSetting::allCached();
        $this->form->fill($settings->map(fn ($s) => $s->value)->all());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->description('Basic site information')
                    ->icon('heroicon-m-information-circle')
                    ->schema([
                        TextInput::make('site_name')->required()->maxLength(255)->prefixIcon('heroicon-m-globe-alt'),
                        Textarea::make('site_description')->maxLength(65535),
                    ])->columns(1),
                Section::make('About')
                    ->description('Organization details')
                    ->icon('heroicon-m-building-library')
                    ->schema([
                        Textarea::make('about_us')->maxLength(65535),
                        Textarea::make('mission')->maxLength(65535),
                        Textarea::make('vision')->maxLength(65535),
                    ])->columns(1),
                Section::make('Contact')
                    ->description('Contact information')
                    ->icon('heroicon-m-phone')
                    ->schema([
                        TextInput::make('address')->maxLength(255)->prefixIcon('heroicon-m-map-pin'),
                        TextInput::make('email')->email()->maxLength(255)->prefixIcon('heroicon-m-envelope'),
                        TextInput::make('phone')->maxLength(255)->prefixIcon('heroicon-m-phone'),
                    ])->columns(2),
                Section::make('Social Media')
                    ->description('Social media links')
                    ->icon('heroicon-m-share')
                    ->schema([
                        TextInput::make('facebook_url')->label('Facebook URL')->url()->maxLength(255)->prefixIcon('heroicon-m-globe-alt'),
                        TextInput::make('twitter_url')->label('Twitter URL')->url()->maxLength(255)->prefixIcon('heroicon-m-globe-alt'),
                        TextInput::make('instagram_url')->label('Instagram URL')->url()->maxLength(255)->prefixIcon('heroicon-m-globe-alt'),
                        TextInput::make('linkedin_url')->label('LinkedIn URL')->url()->maxLength(255)->prefixIcon('heroicon-m-globe-alt'),
                        TextInput::make('youtube_url')->label('YouTube URL')->url()->maxLength(255)->prefixIcon('heroicon-m-globe-alt'),
                    ])->columns(2),
                Section::make('Branding')
                    ->description('Logo, favicon and footer text')
                    ->icon('heroicon-m-paint-brush')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->directory('settings')
                            ->maxSize(1024)
                            ->avatar()
                            ->label('Site Logo'),
                        FileUpload::make('favicon')
                            ->image()
                            ->directory('settings')
                            ->maxSize(512)
                            ->avatar()
                            ->label('Favicon'),
                        Textarea::make('footer_text')->maxLength(65535),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '']
            );
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Save Settings')
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }
}
