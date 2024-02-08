<?php

namespace App\Filament\Widgets;

use App\Models\Profile;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ProfileStatus extends BaseWidget
{
    protected static ?int $sort = 4;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Profile::query()->select()
            )
            ->paginated(false)
            ->heading('Profile Status')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Manager'),
                TextColumn::make('job_position')
                    ->label('Job Position'),
                IconColumn::make('is_open_to_work')
                    ->label('Open to Work')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('is_downloadable')
                    ->label('Resume')
                    ->alignCenter()
                    ->boolean(),
            ]);
    }
}
