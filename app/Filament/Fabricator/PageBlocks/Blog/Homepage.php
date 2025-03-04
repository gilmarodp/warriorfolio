<?php

namespace App\Filament\Fabricator\PageBlocks\Blog;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Homepage extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('blog.homepage')
            ->hidden()
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
