<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Tables\Columns\AvatarWithDetails;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'System';

    public static function getLabel(): ?string
    {
        return __('user.label');
    }

    public static function getPluralLabel(): ?string
    {
        return __('user.label_plural');
    }

    public static function canView(Model $record): bool
    {
        return $record->id == Auth::id() || Auth::user()->role < 3;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return $record->id == Auth::id() || Auth::user()->role < 3;
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()->role < 3;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->role < 3;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                AvatarWithDetails::make('name')
                    ->label(__('user.columns.name'))
                    ->searchable()
                    ->sortable()
                    ->marginStart()
                    ->avatar(function ($record) {
                        return $record->avatar;
                    })
                    ->avatarType('image')
                    ->title(function ($record) {
                        return $record->name;
                    })
                    ->description(function ($record) {
                        return $record->email;
                    }),
                AvatarWithDetails::make('role')
                    ->label(__('user.columns.role'))
                    ->searchable()
                    ->sortable()
                    ->marginStart()
                    ->bgColor(function ($record) {
                        $state = $record->role;

                        if ($state == 1) {
                            return '#10B981';
                        } elseif ($state == 2) {
                            return '#F59E0B';
                        } elseif ($state == 3) {
                            return '#3B82F6';
                        }
                    })
                    ->avatarType('icon')
                    ->icon('tabler-shield-check-filled')
                    ->title(function ($record) {
                        $state = $record->role;

                        if ($state == 1) {
                            return __('user.admin.super_admin');
                        } elseif ($state == 2) {
                            return __('user.admin.admin');;
                        } elseif ($state == 3) {
                            return __('user.admin.user');;
                        }
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                    ->url(fn(Model $record): string => route('filament.admin.resources.users.editProfile', [
                        'record' => $record->id,
                    ]))
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->recordUrl(function ($record) {
                return route('filament.admin.resources.users.editProfile', ['record' => $record->id]);
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
            'index'        => Pages\ListUsers::route('/'),
            'create'       => Pages\CreateUser::route('/create'),
            'edit'         => Pages\EditUser::route('/{record}/edit'),
            'editProfile'  => Pages\CustomEditProfile::route('/{record}/edit-profile'),
        ];
    }
}
