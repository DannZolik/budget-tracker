<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Forms\Form;
use App\Rules\MatchOldPassword;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Session;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class CustomEditProfile extends EditRecord
{
    use InteractsWithRecord;

    protected static string $resource = UserResource::class;

    public function mount(int | string $record): void
    {
        $this->record = User::find($record);

        if (is_null($this->record)) {
            abort(404);
        }

        if ($this->record->id != Auth::id() && Auth::user()->role >= 3) {
            abort(403);
        }

        $this->fillForm();
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns([
                'default' => 12,
                'sm' => 12,
                'md' => 12,
                'lg' => 12,
            ])
            ->schema([
                Section::make(__('user.fields.edit_profile'))
                    ->columnSpan([
                        'default' => 12,
                        'sm' => 7,
                        'md' => 7,
                        'lg' => 7,
                    ])
                    ->columns([
                        'default' => 12,
                        'sm' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ])
                    ->schema([
                        TextInput::make('name')
                            ->label(__('user.columns.name'))
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                        TextInput::make('email')
                            ->label(__('user.fields.email'))
                            ->required()
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                        TextInput::make('phone')
                            ->label(__('user.fields.phone'))
                            ->numeric()
                            ->minValue(100000)
                            ->unique(ignoreRecord: true)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                        Textarea::make('goals')
                            ->label(__('user.fields.goals'))
                            ->rows(4)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                    ]),
                Group::make([
                    Section::make(__('user.fields.avatar'))
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
                    Section::make(__('user.fields.password_change'))
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
                            TextInput::make('password_old')
                                ->label(__('user.fields.old_password'))
                                ->password()
                                ->revealable()
                                ->prefixIcon('tabler-lock')
                                ->requiredWith('password, password_confirmation')
                                ->dehydrated(false)
                                ->rules(['min:8', 'regex:/^\S*$/', new MatchOldPassword])
                                ->hidden(fn(string $context, $record): bool => $context === 'create' || Auth::id() !== $record->id)
                                ->afterStateUpdated(function ($record, $operation, $get, $state) {
                                    $passwordConfirmation = $get('password_confirmation');
                                    $newPassword = $get('password');
                                    $oldPassword = $state;

                                    if (
                                        $operation != 'create'
                                        && $record->id == Auth::id()
                                        && $passwordConfirmation == $get('password')
                                        && strlen($newPassword) >= 8
                                        && strlen($passwordConfirmation) >= 8
                                        && $get('password') !== ''
                                        && $get('password') !== null
                                        && $get('password') != $oldPassword
                                        && password_verify($oldPassword, $record->password)
                                    ) {
                                        Session::flush();
                                        return redirect('/app/login ');
                                    }
                                })
                                ->columnSpan([
                                    'default' => 12,
                                    'sm' => 12,
                                    'md' => 12,
                                    'lg' => 12,
                                ]),
                            TextInput::make('password')
                                ->label(__('user.fields.password'))
                                ->password()
                                ->revealable()
                                ->prefixIcon('tabler-lock-plus')
                                ->requiredWith('password_old, password_confirmation')
                                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                ->dehydrated(fn($state) => filled($state))
                                ->required(function ($context): bool {
                                    return $context === 'create';
                                })
                                ->afterStateUpdated(function ($record, $operation, $get, $state, $context) {
                                    $passwordConfirmation = $get('password_confirmation');
                                    $oldPassword = $get('password_old');

                                    if (
                                        $operation != 'create'
                                        && strlen($state) >= 8
                                        && strlen($passwordConfirmation) >= 8
                                        && $record->id == Auth::id()
                                        && $passwordConfirmation == $state
                                        && $state !== ''
                                        && $state !== null
                                        && $state != $oldPassword
                                        && password_verify($oldPassword, $record->password)
                                    ) {
                                        Session::flush();
                                        return redirect('/app/login');
                                    }
                                })
                                ->confirmed()
                                ->different('password_old')
                                ->rules(['confirmed', 'min:8', 'regex:/^\S*$/'])
                                ->columnSpan([
                                    'default' => 12,
                                    'sm' => 12,
                                    'md' => 12,
                                    'lg' => 12,
                                ]),
                            TextInput::make('password_confirmation')
                                ->label(__('user.fields.password_confirmation'))
                                ->password()
                                ->required(function ($context): bool {
                                    return $context === 'create';
                                })
                                ->revealable()
                                ->prefixIcon('tabler-lock-exclamation')
                                ->requiredWith('password, password_old')
                                ->dehydrated(false)
                                ->rules(['min:8', 'regex:/^\S*$/'])
                                ->required(fn(string $context): bool => $context === 'create')
                                ->afterStateUpdated(function ($record, $operation, $get, $state) {
                                    $passwordConfirmation = $state;
                                    $oldPassword = $get('password_old');

                                    if (
                                        $operation != 'create'
                                        && $record->id == Auth::id()
                                        && $passwordConfirmation == $get('password')
                                        && strlen($get('password')) >= 8
                                        && strlen($passwordConfirmation) >= 8
                                        && $get('password') !== ''
                                        && $get('password') !== null
                                        && $get('password') != $oldPassword
                                        && password_verify($oldPassword, $record->password)
                                    ) {
                                        Session::flush();
                                        return redirect('/app/login ');
                                    }
                                })
                                ->columnSpan([
                                    'default' => 12,
                                    'sm' => 12,
                                    'md' => 12,
                                    'lg' => 12,
                                ]),
                        ])
                        ->visible(fn($record) => $record->id == Auth::id()),
                ])->columnSpan([
                    'default' => 12,
                    'sm' => 5,
                    'md' => 5,
                    'lg' => 5,
                ])->columns([
                    'default' => 12,
                    'sm' => 12,
                    'md' => 12,
                    'lg' => 12,
                ])
            ]);
    }
}
