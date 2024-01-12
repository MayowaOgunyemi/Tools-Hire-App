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
use Filament\Forms\ComponentContainer;
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
                    ->visible(fn () => auth()->user()->role == 'admin')
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
                Action::make('edit')->color('primary')
                ->tooltip('Edit')->icon('heroicon-s-pencil-square')->size('md')
                ->mountUsing(fn (ComponentContainer $form, Tool $record) => $form->fill([
                    'name' => $record->name,
                    'category_id' => $record->category_id,
                    'cost' => $record->cost,
                    'description' => $record->description,
                ]))
                ->modalHeading('Edit Tool')->modalSubmitActionLabel('Update')
                ->color('info')
                ->action(fn ($record,  array $data) => $this->editTool($record, $data))
                ->form([
                    SpatieMediaLibraryFileUpload::make('attachment')->collection('tools')->label('Upload Tool Images')
                            ->disk('public')
                            ->multiple()
                            ->imagePreviewHeight('50')
                            ->image()
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

    protected function editTool(Tool $record, $data)
    {
        
        $record->update([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'cost' => $data['cost'],
            'description' => $data['description'],

        ]);

        
    }

    public function render(): View
    {
        return view('livewire.tools.list-tools');
    }
}
