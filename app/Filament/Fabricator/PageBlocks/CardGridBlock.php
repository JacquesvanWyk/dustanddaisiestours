<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
                TextInput::make('eyebrow')->default('Route collection'),
                TextInput::make('heading'),
                Textarea::make('intro')
                    ->rows(3)
                    ->default('Guided routes designed as intimate field experiences. Each one is paced for conversation, context and the changing moods of Namaqualand.'),
                Repeater::make('cards')
                    ->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('summary')->rows(3),
                        Textarea::make('description')
                            ->rows(3)
                            ->helperText('Legacy/freeform details. Structured fields below are preferred.'),
                        TextInput::make('stamp')
                            ->default('Day route'),
                        TextInput::make('label')
                            ->default('Curated itinerary'),
                        TextInput::make('price'),
                        TextInput::make('duration'),
                        TextInput::make('distance'),
                        TextInput::make('difficulty'),
                        TextInput::make('group_size'),
                        Select::make('guide_type')
                            ->options([
                                'private-guide' => 'Private guide',
                                'self-drive' => 'Self-drive',
                                'guided-hike' => 'Guided hike',
                                'seasonal-route' => 'Seasonal route',
                            ])
                            ->default('private-guide'),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('gallery'),
                        TextInput::make('link')
                            ->helperText('Use an internal path like /hiking-trails or a full URL like https://example.com')
                            ->rule('regex:/^(\/(?!\/).*)|(https?:\/\/.+)$/i'),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                    ->collapsible()
                    ->grid(2),
            ]);
    }
}
