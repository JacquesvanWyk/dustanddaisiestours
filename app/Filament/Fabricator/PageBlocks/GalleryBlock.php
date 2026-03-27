<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class GalleryBlock extends PageBlock
{
    protected static string $name = 'gallery';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('heading'),
                Repeater::make('images')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->directory('gallery'),
                        TextInput::make('alt')
                            ->label('Alt text'),
                        TextInput::make('caption'),
                    ])
                    ->reorderable()
                    ->collapsible()
                    ->defaultItems(0),
            ]);
    }
}
