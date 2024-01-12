<?php

namespace App\Livewire\Rentals;

use Filament\Tables;
use Livewire\Component;
use Filament\Tables\Table;
use App\Models\ToolsRental;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ToolRentals extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(ToolsRental::query())
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('tool.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_of_days')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('approve')
                    ->color('success')
                    ->icon('heroicon-m-check')
                    ->requiresConfirmation()
                    ->visible(fn (ToolsRental $record) => $record->is_approved == false)
                    ->action(fn (ToolsRental $record) => $record->update(['is_approved' => true])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.rentals.tool-rentals');
    }
}
