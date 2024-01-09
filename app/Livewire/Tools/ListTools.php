<?php

namespace App\Livewire\Tools;

use App\Models\Tool;
use Filament\Tables;
use Livewire\Component;
use App\Models\Category;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ListTools extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Tool::query())
            ->columns([
                TextColumn::make('name')
                    ->label('Tool')
                    ->searchable(),
                TextColumn::make('category.name'),
                TextColumn::make('user.name')->label('Creator'),
                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('cost')
                    ->money('EUR')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn ($state)  => match ($state) {
                        2 => 'Rejected',
                        1 => 'Approved',
                        0 => 'Pending',
                    })
                    ->color(fn ($state)  => match ($state) {
                        2 => 'danger',
                        1 => 'success',
                        0 => 'info',
                    }),
                TextColumn::make('description')
                    ->extraAttributes(['class' => 'whitespace-normal'])
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                ViewColumn::make('id')->view('tables.columns.tools-image')->label('Image'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->heading('Manage Tools')
            ->headerActions([
                CreateAction::make('createTool')
                    ->label('Create Tool')
                    // ->visible(fn () => auth()->user()->openTickets()->count() == 0)
                    ->color('success')
                    ->icon('heroicon-m-plus')
                    ->successNotificationTitle('Tool Created')
                    ->createAnother(false)
                    ->model(Tool::class)
                    ->modalHeading('Create new tool')
                    ->form([
                        SpatieMediaLibraryFileUpload::make('attachment')->collection('tools')->label('Upload Tool Images')
                            ->disk('public')
                            ->multiple()
                            ->imagePreviewHeight('50')
                            ->image()
                            // ->visibility('private')
                            ->reorderable()
                            ->maxSize(8048),

                        Section::make()
                            ->columns([
                                'sm' => 1,
                                'xl' => 2,
                            ])
                            ->schema([
                                TextInput::make('name')
                                    ->label('Tool Name')
                                    ->placeholder('Hand tool')
                                    ->required()
                                    ->maxLength(100)
                                    ->columnSpan([
                                        'sm' => 2,
                                        'xl' => 2,
                                    ]),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->options(Category::all()->pluck('name', 'id'))->required()
                                    ->searchable(),
                                TextInput::make('cost')->label('Cost')->numeric()->required()->maxLength(50),
                                Textarea::make('description')->required()
                                    ->placeholder('Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum odio impedit non, incidunt iste velit id laboriosam enim assumenda dignissimos cum consectetur nostrum qui soluta, vero dicta fugiat, ullam adipisci!')
                                    ->required()
                                    ->maxLength(250)->columnSpan([
                                        'sm' => 2,
                                        'xl' => 2,
                                    ]),
                            ]),
                    ]),
                Action::make('Refresh')
                    ->color('info')
                    ->icon('heroicon-m-arrow-path')
                    ->label("Refresh")
                    ->action(fn () => $this->dispatch('refresh'))
                    ->size('md')
            ])
            ->filters([
                //
            ])
            ->actions([
                // Action::make('edit')->color('primary')
                // ->tooltip('Edit')->icon('heroicon-s-pencil-square')->label("")->size('md')
                // ->mountUsing(fn (ComponentContainer $form, Trades $record) => $form->fill([
                //     'amount' => $record->amount,
                //     'cardId' => $record->giftcard->id,
                //     'categoryId' => $record->giftcardcategory->id,
                //     'type' => $record->giftcardcategory->type,
                //     'fx' => $record->fx_value,
                //     'rate' => $record->giftcardcategory->rate,
                // ]))->modalHeading('Edit Transaction')->modalSubmitActionLabel('Update transaction')
                // ->color('info')
                // ->action(fn ($record,  array $data) => $this->editTrade($record, $data))
                // ->form([
                //     Grid::make(2)
                //         ->schema([
                //             TextInput::make('amount')->label('Naira Amount')->required()->numeric(),
                //             TextInput::make('fx')->label('FX Value')->numeric()
                //                 ->reactive()
                //                 ->afterStateUpdated(fn (callable $set, $get) => $set('amount', (int) $get('rate') * (int) $get('fx'))),
                //         ]),
                //     Grid::make(2)
                //         ->schema([
                //             Select::make('cardId')
                //                 ->label('Card')
                //                 ->options(Cards::all()->pluck('name', 'id'))
                //                 ->searchable()
                //                 ->required()
                //                 ->reactive()
                //                 ->afterStateUpdated(fn (callable $set) => $set('categoryId', null)),
                //             Select::make('categoryId')
                //                 ->label('Category')
                //                 ->options(function (callable $get) {
                //                     $card = Cards::find($get('cardId'));
                //                     if (!$card) {
                //                         return CardCategory::all()->pluck('name', 'id');
                //                     }
                //                     return $card->sub->pluck('name', 'id');
                //                 })
                //                 ->reactive()
                //                 ->afterStateUpdated(function (Closure $set, callable $get, $state) {
                //                     $set('rate', CardCategory::find($state)->rate);
                //                     $set('amount', $get('rate') * $get('fx'));
                //                 })
                //                 ->searchable()
                //                 ->required(),
                //         ]),
                // ]),

            Action::make('approve')
                    ->color('success')
                    ->icon('heroicon-m-check')
                    ->requiresConfirmation()
                    ->visible(fn (Tool $record) => $record->status == 0)
                    ->action(fn (Tool $record) => $record->update(['status' => 1])),
                Action::make('reject')
                    ->color('danger')
                    ->icon('heroicon-m-x-mark')
                    ->visible(fn (Tool $record) => $record->status == 0)
                    ->requiresConfirmation()
                    ->action(fn (Tool $record) => $record->update(['status' => 2])),
                Action::make('delete')
                    ->requiresConfirmation()
                    ->icon('heroicon-m-trash')
                    ->visible(fn (Tool $record) => $record->status == 0)
                    ->action(fn (Tool $record) => $record->delete())
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    // protected function editTrade(Trades $record, $data)
    // {
    //     $record->update([
    //         'amount' => $data['amount'],
    //         'cardcategory_id' => $data['categoryId'],
    //         'card_id' => $data['cardId'],
    //         'fx_value' => $data['fx'],

    //     ]);
    // }

    public function render(): View
    {
        return view('livewire.tools.list-tools');
    }
}
