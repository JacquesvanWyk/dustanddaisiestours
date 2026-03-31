<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CtaBlock extends PageBlock
{
    protected static string $name = 'cta';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                TextInput::make('eyebrow')
                    ->label('Eyebrow')
                    ->helperText('Small label above the main heading.'),
                TextInput::make('heading')
                    ->required()
                    ->label('Heading'),
                TextInput::make('subheading')
                    ->label('Subheading')
                    ->helperText('Short supporting line below the main heading.'),
                Textarea::make('body')
                    ->label('Body')
                    ->rows(3)
                    ->default('We design private day tours and trail days around season, bloom conditions and your pace. Tell us what you want to feel, not just where you want to stop.'),
                TextInput::make('button_text')
                    ->required()
                    ->label('Button text'),
                TextInput::make('button_link')
                    ->label('Button link')
                    ->required()
                    ->helperText('Use an internal path like /contact or a full URL like https://example.com')
                    ->rule('regex:/^(\/(?!\/).*)|(https?:\/\/.+)$/i'),
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
