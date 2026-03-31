<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContactBlock extends PageBlock
{
    protected static string $name = 'contact';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('eyebrow')->default('Make contact'),
                TextInput::make('heading')->required(),
                Textarea::make('body')->rows(3),
                TextInput::make('info_heading')->default('Base camp'),
                TextInput::make('location_name')->default('Springbok'),
                TextInput::make('location_detail')->default('Northern Cape, South Africa'),
                Textarea::make('planner_note')
                    ->rows(3)
                    ->default('Tell us when you want to travel, how many people are joining, and whether you want blooms, geology, culture or hiking to lead the route.'),
                Textarea::make('map_embed_url')
                    ->rows(3)
                    ->default('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27089.86!2d17.88!3d-29.67!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c3622d19cb6f0a7%3A0x45a32a3b7b7f5c0!2sSpringbok%2C%20South%20Africa!5e0!3m2!1sen!2s!4v1'),
                Toggle::make('show_form')->default(true),
            ]);
    }
}
