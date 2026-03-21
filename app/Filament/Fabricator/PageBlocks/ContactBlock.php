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
                TextInput::make('heading')->required(),
                Textarea::make('body')->rows(3),
                Toggle::make('show_form')->default(true),
            ]);
    }
}
