<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Earnings;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\EarningCategory;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use App\Filament\Resources\EarningsResource\Pages;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;

class EarningsResource extends Resource
{
    protected static ?string $model = Earnings::class;
    protected static ?string $navigationGroup = 'Earnings';

    public static function getLabel(): ?string
    {
        return __('earning.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('earning.label_plural');
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
                Section::make(__('earning.earning_general_information'))
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
                            ->label(__('earning.fields.name'))
                            ->placeholder(__('earning.placeholders.name'))
                            ->maxLength(255)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 4,
                                'md' => 4,
                                'lg' => 4,
                            ])
                            ->required(),
                        TextInput::make('sum')
                            ->label(__('earning.fields.sum'))
                            ->numeric()
                            ->minValue(0)
                            ->placeholder(__('earning.placeholders.sum'))
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
                            ->label(__('earning.fields.category'))
                            ->placeholder(__('earning.placeholders.category'))
                            ->prefixIcon('tabler-report-money')
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 4,
                                'md' => 4,
                                'lg' => 4,
                            ])
                            ->options(EarningCategory::where('user_id', Auth::id())->pluck('name', 'id'))
                            ->preload()
                            ->searchable(),
                        Textarea::make('description')
                            ->label(__('earning.fields.description'))
                            ->placeholder(__('earning.placeholders.description'))
                            ->maxLength(65535)
                            ->rows(4)
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
                    ->label(__('earning.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                TextColumn::make('earningsCategory.name')
                    ->label(__('earning.fields.category'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sum')
                    ->label(__('earning.fields.sum'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->icon('tabler-calendar')
                    ->date('d-m-Y')
                    ->label(__('earning.fields.date'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label(__('earning.fields.description'))
                    ->sortable()
                    ->searchable()
                    ->limit(50),
            ])->defaultSort('created_at', 'DESC')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('user_id', Auth::id());
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
            'index' => Pages\ListEarnings::route('/'),
            'create' => Pages\CreateEarnings::route('/create'),
            'edit' => Pages\EditEarnings::route('/{record}/edit'),
        ];
    }
}
