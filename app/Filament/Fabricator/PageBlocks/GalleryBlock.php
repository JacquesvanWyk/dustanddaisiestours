<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class GalleryBlock extends PageBlock
{
    protected static string $name = 'gallery';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('eyebrow')->default('Archive of place'),
                TextInput::make('heading'),
                Textarea::make('intro')
                    ->rows(3)
                    ->default('A visual record of stone, flora, weather, trails and the slower textures of the Northern Cape. Open any frame for a closer look.'),
                Repeater::make('images')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->disk('public')
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
