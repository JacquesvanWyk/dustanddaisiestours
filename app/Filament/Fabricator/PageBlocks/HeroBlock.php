<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeroBlock extends PageBlock
{
    protected static string $name = 'hero';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                Select::make('variant')
                    ->options([
                        'simple' => 'Simple (page header)',
                        'full' => 'Full (slider + editorial)',
                    ])
                    ->default('simple')
                    ->live()
                    ->required(),
                TextInput::make('heading')->required(),
                TextInput::make('subheading'),
                TextInput::make('cta_text'),
                TextInput::make('cta_link')
                    ->helperText('Use an internal path like /day-tours or a full URL like https://example.com')
                    ->rule('regex:/^(\/(?!\/).*)|(https?:\/\/.+)$/i'),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('gallery'),
                Repeater::make('slides')
                    ->schema([
                        TextInput::make('heading')->required(),
                        TextInput::make('subheading'),
                        TextInput::make('cta_text'),
                        TextInput::make('cta_link')
                            ->helperText('Use an internal path like /day-tours or a full URL like https://example.com')
                            ->rule('regex:/^(\/(?!\/).*)|(https?:\/\/.+)$/i'),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('gallery'),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['heading'] ?? null)
                    ->collapsible()
                    ->defaultItems(0)
                    ->visible(fn (Get $get): bool => $get('variant') === 'full'),
            ]);
    }
}
