<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class EmptySeparator extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.empty-separator')
            ->label('Empty Separator')
            ->icon('heroicon-o-arrows-pointing-out')
            ->schema([
                Section::make('Empty Separator')
                    ->description('Add an empty separator to your page.')
                    ->icon('heroicon-o-arrows-pointing-out')
                    ->collapsed()
                    ->schema([
                        Select::make('class')
                            ->label('Vertical padding (py)')
                            ->helperText('Select the padding size for the separator.')
                            ->options([
                                'py-1 md:py-2 lg:py-4'    => 'Extra Small',
                                'py-3 md:py-6 lg:py-12'   => 'Small',
                                'py-6 md:py-12 lg:py-24'  => 'Medium',
                                'py-12 md:py-24 lg:py-48' => 'Large',
                                'py-24 md:py-48 lg:py-96' => 'Extra Large',
                            ])
                            ->default('py-3 md:py-6 lg:py-12')
                            ->required(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
