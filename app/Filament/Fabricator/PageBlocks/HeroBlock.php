<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeroBlock extends PageBlock
{
    protected static string $name = 'hero';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('heading')->required(),
                TextInput::make('subheading'),
                TextInput::make('cta_text'),
                TextInput::make('cta_link')->url(),
                FileUpload::make('image')
                    ->image()
                    ->directory('heroes'),
            ]);
    }
}
