<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class TextImageBlock extends PageBlock
{
    protected static string $name = 'text-image';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('eyebrow')->default('Landscape notes'),
                TextInput::make('heading')->required(),
                RichEditor::make('body')->required(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('gallery'),
                TextInput::make('stamp')->default('Field record'),
                Select::make('image_position')
                    ->options([
                        'left' => 'Left',
                        'right' => 'Right',
                    ])
                    ->default('right'),
            ]);
    }
}
