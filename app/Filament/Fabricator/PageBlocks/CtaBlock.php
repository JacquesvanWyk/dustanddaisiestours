<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CtaBlock extends PageBlock
{
    protected static string $name = 'cta';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('heading')->required(),
                TextInput::make('subheading'),
                TextInput::make('button_text')->required(),
                TextInput::make('button_link')->url()->required(),
                Select::make('background_color')
                    ->options([
                        'orange' => 'Orange',
                        'white' => 'White',
                        'gray' => 'Gray',
                        'dark' => 'Dark',
                    ])
                    ->default('orange'),
            ]);
    }
}
