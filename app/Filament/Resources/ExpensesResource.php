<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Expenses;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\ExpenseCategory;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use App\Filament\Resources\ExpensesResource\Pages;
use Illuminate\Database\Eloquent\Model;

class ExpensesResource extends Resource
{
    protected static ?string $model = Expenses::class;
    protected static ?string $navigationIcon = 'tabler-brand-shopee';
    protected static ?string $navigationGroup = 'Expenses';

    public static function getLabel(): ?string
    {
        return __('expense.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('expense.label_plural');
    }

    public static function canView(Model $record): bool
    {
        return $record->user_id == Auth::id() || Auth::user()->role < 3;
    }

    public static function canEdit(Model $record): bool
    {
        return $record->user_id == Auth::id() || Auth::user()->role < 3;
    }

    public static function canDelete(Model $record): bool
    {
        return $record->user_id == Auth::id() || Auth::user()->role < 3;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns([
                'default' => 12,
                'sm' => 12,
                'md' => 12,
                'lg' => 12,
            ])
            ->schema([
                Section::make(__('expense.expense_general_information'))
                    ->columnSpan([
                        'default' => 12,
                        'sm' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ])
                    ->columns([
                        'default' => 12,
                        'sm' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ])
                    ->schema([
                        TextInput::make('name')
                            ->label(__('expense.fields.name'))
                            ->placeholder(__('expense.placeholders.name'))
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 4,
                                'md' => 4,
                                'lg' => 4,
                            ])
                            ->required(),
                        TextInput::make('sum')
                            ->label(__('expense.fields.sum'))
                            ->placeholder(__('expense.placeholders.sum'))
                            ->prefixIcon('tabler-pig-money')
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 4,
                                'md' => 4,
                                'lg' => 4,
                            ])
                            ->required(),
                        Select::make('category_id')
                            ->required()
                            ->label(__('expense.fields.category'))
                            ->placeholder(__('expense.placeholders.category'))
                            ->prefixIcon('tabler-report-money')
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 4,
                                'md' => 4,
                                'lg' => 4,
                            ])
                            ->options(ExpenseCategory::where('user_id', Auth::id())->pluck('name', 'id'))
                            ->preload()
                            ->searchable(),
                        RichEditor::make('description')
                            ->label(__('expense.fields.description'))
                            ->placeholder(__('expense.placeholders.description'))
                            //                            ->rows(4)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                        Hidden::make('user_id')
                            ->default(function () {
                                return Auth::id();
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('expense.fields.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('expensesCategory.name')
                    ->label(__('expense.fields.category'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sum')
                    ->label(__('expense.fields.sum'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->icon('tabler-calendar')
                    ->date('d-m-Y')
                    ->label(__('expense.fields.date'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label(__('expense.fields.description'))
                    ->sortable()
                    ->searchable()
                    ->limit(50),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc');
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpenses::route('/create'),
            'edit' => Pages\EditExpenses::route('/{record}/edit'),
        ];
    }
}
