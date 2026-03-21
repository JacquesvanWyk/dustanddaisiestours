<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CardGridBlock extends PageBlock
{
    protected static string $name = 'card-grid';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('heading'),
                Repeater::make('cards')
                    ->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('description')->rows(2),
                        FileUpload::make('image')
                            ->image()
                            ->directory('cards'),
                        TextInput::make('link')->url(),
                    ])
                    ->collapsible()
                    ->grid(2),
            ]);
    }
}
