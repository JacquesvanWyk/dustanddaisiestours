<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BookingFormBlock extends PageBlock
{
    protected static string $name = 'booking-form';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('eyebrow')->default('Trip planning desk'),
                TextInput::make('heading')->default('Book Your Tour'),
                Textarea::make('body')->rows(2),
                TextInput::make('info_heading')->default('Before you submit'),
                Textarea::make('info_body')
                    ->rows(4)
                    ->default("We shape bookings around seasonality, weather, walking pace and the kind of stories you want guiding the day.\n\nShare any mobility needs, photography interests or bloom priorities in the notes and we will tailor the route."),
                Repeater::make('info_badges')
                    ->schema([
                        TextInput::make('label')->required(),
                    ])
                    ->default([
                        ['label' => 'Private guiding'],
                        ['label' => 'Season-sensitive routes'],
                        ['label' => 'From Springbok'],
                    ])
                    ->maxItems(4)
                    ->collapsible(),
            ]);
    }
}
