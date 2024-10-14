<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\EarningCategory;
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
use App\Filament\Resources\EarningCategoryResource\Pages;
use App\Filament\Resources\EarningsResource\Pages\CustomEarningCreate;

class EarningCategoryResource extends Resource
{
    protected static ?string $model = EarningCategory::class;
    protected static ?string $navigationGroup = 'Earnings';

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
                Section::make(__('Earning category general information'))
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
                            ->label('Title')
                            ->required()
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
                        ColorPicker::make('icon_color')
                            ->label('Icon color')
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        ColorPicker::make('bg_color')
                            ->label('Background color')
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        IconPicker::make('icon')
                            ->sets(['tabler'])
                            ->label('Icon')
                            ->required()
                            ->preload()
                            ->columns(3)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        Textarea::make('description')
                            ->label('Description')
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
                        ->label('Name')
                        ->searchable()
                        ->sortable()
                        ->weight(FontWeight::Bold)
                        ->size(TextColumnSize::Large),
                    TextColumn::make('description')
                        ->words(15)
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
                return route('filament.admin.resources.earning-categories.create_custom', ['category' => $record->id]);
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
            'index' => Pages\ListEarningCategories::route('/'),
            'create' => Pages\CreateEarningCategory::route('/create'),
            'edit' => Pages\EditEarningCategory::route('/{record}/edit'),

            'create_custom' => CustomEarningCreate::route('{category}/create'),
        ];
    }
}
