<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FaqBlock extends PageBlock
{
    protected static string $name = 'faq';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('eyebrow')->default('Practical details'),
                TextInput::make('heading'),
                Repeater::make('items')
                    ->schema([
                        TextInput::make('question')->required(),
                        Textarea::make('answer')->required()->rows(3),
                    ])
                    ->collapsible(),
            ]);
    }
}
