<?php

namespace App\Livewire\Users;

use Filament\Tables;
use App\Models\Review;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class UserReviews extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Review::query())
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('comment')
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
                    ->visible(fn (Review $record) => !$record->is_approved)
                    ->action(fn (Review $record) => $record->update(['is_approved' => true])),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->icon('heroicon-m-trash')
                    ->visible(fn (Review $record) => !$record->is_approved)
                    ->action(fn (Review $record) => $record->delete())
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.users.user-reviews');
    }
}
