<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;

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

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('site_name')->label('Site Name')->required(),
                TextInput::make('tagline'),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->label('Logo'),
                FileUpload::make('logo_white')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->label('White Logo'),
                TextInput::make('phone')->tel()->label('Phone (Elmarie)'),
                TextInput::make('phone_label')->label('Phone Label')->placeholder('e.g. Elmarie'),
                TextInput::make('phone_2')->tel()->label('Phone 2 (Nicky)'),
                TextInput::make('phone_2_label')->label('Phone 2 Label')->placeholder('e.g. Nicky'),
                TextInput::make('email')->email(),
                Textarea::make('address')->rows(3),
                TextInput::make('location_region')->label('Location Region')->placeholder('e.g. Northern Cape'),
                TextInput::make('location_detail')->label('Location Detail')->placeholder('e.g. Springbok, Namaqualand'),
                TextInput::make('facebook_url')->label('Facebook URL')->url(),
                TextInput::make('instagram_url')->label('Instagram URL')->url(),
                Textarea::make('whatsapp_note')->label('WhatsApp Note')->rows(2),
                Textarea::make('meta_description')->label('Meta Description')->rows(3),
                TextInput::make('footer_tagline')->label('Footer Tagline'),
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
