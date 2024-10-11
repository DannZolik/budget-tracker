<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Filament\Resources\UserResource\Pages;
use Filament\Forms\Components\TextInput;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    // protected static ?string $navigationIcon = 'tabler-users';
    protected static ?string $navigationGroup = 'System';

    public static function form(Form $form): Form
    {
        return $form
            ->columns([
                'default' => 12,
                'sm'      => 12,
                'md'      => 12,
                'lg'      => 12,
            ])
            ->schema([
                Section::make(__('User Information'))
                    ->columnSpan([
                        'default' => 12,
                        'sm'      => 8,
                        'md'      => 8,
                        'lg'      => 8,
                    ])
                    ->columns([
                        'default' => 12,
                        'sm'      => 12,
                        'md'      => 12,
                        'lg'      => 12,
                    ])
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm'      => 6,
                                'md'      => 6,
                                'lg'      => 6,
                            ]),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm'      => 6,
                                'md'      => 6,
                                'lg'      => 6,
                            ]),
                        Select::make('role')
                            ->relationship(name: 'role', titleAttribute: 'name')
                            ->label('Role')
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm'      => 6,
                                'md'      => 6,
                                'lg'      => 6,
                            ]),
                    ]),
                    Section::make('Avatar')
                    ->columnSpan([
                        'default' => 12,
                        'sm' => 4,
                        'md' => 4,
                        'lg' => 4,
                    ])
                    ->columns([
                        'default' => 12,
                        'sm' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ])
                    ->schema([
                        FileUpload::make('avatar')
                            ->label('')
                            ->image()
                            ->disk('public')
                            ->directory('users')
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('role')
                    ->formatStateUsing(function ($state) {
                        if ($state == 1) {
                            return "superadmin";
                        }
                        elseif ($state == 2) {
                            return "admin";
                        }
                        elseif ($state == 3) {
                            return "user";
                        }
                    } ),
                TextColumn::make('avatar')
            ])
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
            'index'        => Pages\ListUsers::route('/'),
            'create'       => Pages\CreateUser::route('/create'),
            'edit'         => Pages\EditUser::route('/{record}/edit'),
            'editProfile'  => Pages\CustomEditProfile::route('/{record}/edit-profile'),
        ];
    }
}
