<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?int $navigationSort = 99;

    protected string $view = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('site_name')->label('Site Name')->required(),
                TextInput::make('tagline'),
                FileUpload::make('logo')->image()->directory('branding'),
                TextInput::make('phone')->tel()->label('Phone (Elmarie)'),
                TextInput::make('phone_2')->tel()->label('Phone 2 (Nicky)'),
                TextInput::make('email')->email(),
                Textarea::make('address')->rows(3),
                TextInput::make('facebook_url')->label('Facebook URL')->url(),
                TextInput::make('instagram_url')->label('Instagram URL')->url(),
                Textarea::make('whatsapp_note')->label('WhatsApp Note')->rows(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value);
        }

        Notification::make()->title('Settings saved.')->success()->send();
    }
}
