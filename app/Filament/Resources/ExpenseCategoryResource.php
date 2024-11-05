<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ExpenseCategory;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use App\Tables\Columns\CustomIconColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use App\Filament\Resources\ExpenseCategoryResource\Pages;
use App\Filament\Resources\ExpensesResource\Pages\CustomExpenseCreate;

class ExpenseCategoryResource extends Resource
{
    protected static ?string $model = ExpenseCategory::class;
    protected static ?string $navigationIcon = 'tabler-shopping-bag';
    protected static ?string $navigationGroup = 'Expenses';

    public static function getLabel(): ?string
    {
        return __('expenseCategory.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('expenseCategory.label_plural');
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
                Section::make(__('expenseCategory.earning_category_general_information'))
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
                            ->label(__('expenseCategory.fields.title'))
                            ->required()
                            ->maxLength(255)
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
                        ColorPicker::make('icon_color')->required()
                            ->regex('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/')
                            ->label(__('expenseCategory.fields.icon_color'))
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        ColorPicker::make('bg_color')->required()
                            ->regex('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/')
                            ->label(__('expenseCategory.fields.background_color'))
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        IconPicker::make('icon')->required()
                            ->label(__('expenseCategory.fields.icon'))
                            ->required()
                            ->allowedIcons(["tabler-coin-bitcoin-filled", "tabler-car", "tabler-credit-card-filled", "tabler-shopping-cart-filled", "tabler-gift", "tabler-devices-pc", "tabler-baguette", "tabler-receipt-tax", "tabler-hospital", "tabler-brand-mcdonalds", "tabler-beer-filled", "tabler-device-tv"])
                            ->preload()
                            ->columns(3)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        Textarea::make('description')
                            ->label(__('expenseCategory.fields.description'))
                            ->maxLength(65535)
                            ->nullable()
                            ->rows(3)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    CustomIconColumn::make('icon')
                        ->bg_color(function ($record) {
                            return $record->bg_color;
                        })
                        ->icon(function ($record) {
                            return $record->icon;
                        })
                        ->icon_color(function ($record) {
                            return $record->icon_color;
                        }),
                    TextColumn::make('name')

                        ->label(__('expenseCategory.fields.title'))
                        ->searchable()

                        ->limit(18)
                        ->sortable()
                        ->weight(FontWeight::Bold)
                        ->size(TextColumnSize::Large),
                    TextColumn::make('description')
                        ->label(__('expenseCategory.fields.description'))
                        ->limit(20)
                        ->searchable()
                        ->sortable()
                        ->markdown()
                ]),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('user_id', Auth::id());
            })
            ->contentGrid([
                'default' => 1,
                'md' => 2,
                'lg' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ])->recordUrl(function ($record) {
                return route('filament.admin.resources.expense-categories.create_custom', ['category' => $record->id]);
            });
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
            'index' => Pages\ListExpenseCategories::route('/'),
            'create' => Pages\CreateExpenseCategory::route('/create'),
            'edit' => Pages\EditExpenseCategory::route('/{record}/edit'),

            'create_custom' => CustomExpenseCreate::route('/{category}/create'),
        ];
    }
}
