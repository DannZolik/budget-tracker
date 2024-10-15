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

class EarningsResource extends Resource
{
    protected static ?string $model = Earnings::class;
    protected static ?string $navigationGroup = 'Earnings';

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
                Section::make(__('Earning general information'))
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
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 4,
                                'md' => 4,
                                'lg' => 4,
                            ])
                            ->required(),
                        TextInput::make('sum')
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
                            ->label('Category')
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
                        RichEditor::make('description')
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
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('earningsCategory.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sum')
                    ->label('Earning')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->icon('tabler-calendar')
                    ->date('d-m-Y')
                    ->label('Date')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
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
            'index' => Pages\ListEarnings::route('/'),
            'create' => Pages\CreateEarnings::route('/create'),
            'edit' => Pages\EditEarnings::route('/{record}/edit'),
        ];
    }
}
