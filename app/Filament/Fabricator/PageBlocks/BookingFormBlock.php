<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
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
                TextInput::make('heading')->default('Book Your Tour'),
                Textarea::make('body')->rows(2),
            ]);
    }
}
