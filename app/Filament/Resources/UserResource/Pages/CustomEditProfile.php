<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
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

    public function mount(int | string $record = 1): void
    {
        $this->record = User::find($record);
        $this->fillForm();
    }

    public function form(Form $form): Form
    {
        // if ($form->getRecord()) {
        //     $id = $form->getRecord()->id;
        // } else {
        //     $id = (LearningResource::latest()->first()->id ?? 0) + 1;
        // }

        return $form
            ->columns([
                'default' => 12,
                'sm' => 12,
                'md' => 12,
                'lg' => 12,
            ])
            ->schema([
                Section::make('Edit profile')
                    ->columnSpan([
                        'default' => 12,
                        'sm' => 8,
                        'md' => 8,
                        'lg' => 8,
                    ])
                    ->columns([
                        'default' => 12,
                        'sm' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ])
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        TextInput::make('password')
                            ->label('New password')
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $context): bool => $context === 'create')
                            ->afterStateUpdated(function ($record, $operation, $get) {
                                if (
                                    $operation != 'create' && $record->id == Auth::id()
                                    && $get('password') == $get('password_confirmation')
                                    && strlen($get('password')) >= 8
                                ) {

                                    Session::flush();
                                    return redirect('/login');
                                }
                            })
                            ->rules(['confirmed', 'min:8'])
                            ->columnSpan(12),
                        TextInput::make('password_confirmation')
                            ->label('Password confirmation')
                            ->password()
                            ->revealable()
                            ->dehydrated(false)
                            ->required(fn(string $context): bool => $context === 'create')
                            ->columnSpan(12),
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
}
