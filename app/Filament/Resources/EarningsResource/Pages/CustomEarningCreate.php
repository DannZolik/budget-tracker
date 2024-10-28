<?php

namespace App\Filament\Resources\EarningsResource\Pages;

use App\Models\Earnings;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use App\Filament\Resources\EarningsResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class CustomEarningCreate extends Page implements HasForms
{
    use InteractsWithRecord;
    protected static string $resource = EarningsResource::class;

    public null|int $category_id = null;
    public ?array $data = [];

    public function mount(int $category): void
    {
        $this->category_id = $category;
        $this->record = new Earnings();
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
                Section::make('Earning general information')
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
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ])
                            ->required(),
                        TextInput::make('sum')
                            ->label(__('earning.fields.sum'))
                            ->prefixIcon('tabler-pig-money')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        Textarea::make('description')
                            ->label(__('earning.fields.description'))
                            ->rows(4)
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save()
    {
        $data = $this->form->getState();

        $this->record->name = $data['name'];
        $this->record->description = $data['description'];
        $this->record->sum = $data['sum'];
        $this->record->category_id = $this->category_id;
        $this->record->user_id = Auth::id();
        $this->record->save();

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();

        return redirect()->route('filament.admin.resources.earning-categories.index');
    }
    protected static string $view = 'filament.resources.earnings-resource.pages.custom-earning-create';
}
