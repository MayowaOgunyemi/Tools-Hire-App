<?php

namespace App\Livewire\Users;

use Filament\Tables;
use App\Models\Reply;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class UserReplies extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Reply::query())
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('review.comment')
                    ->numeric(),
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
                    ->visible(fn (Reply $record) => !$record->is_approved)
                    ->action(fn (Reply $record) => $record->update(['is_approved' => true])),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->icon('heroicon-m-trash')
                    ->visible(fn (Reply $record) => !$record->is_approved)
                    ->action(fn (Reply $record) => $record->delete())
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.users.user-replies');
    }
}
