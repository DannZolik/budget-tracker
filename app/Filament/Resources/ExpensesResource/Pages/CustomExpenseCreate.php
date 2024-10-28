<?php

namespace App\Filament\Resources\ExpensesResource\Pages;

use App\Models\Expenses;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use App\Filament\Resources\ExpensesResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class CustomExpenseCreate extends Page implements HasForms
{
    use InteractsWithRecord;
    protected static string $resource = ExpensesResource::class;

    public null|int $category_id = null;
    public ?array $data = [];

    public function mount(int $category): void
    {
        $this->category_id = $category;
        $this->record = new Expenses();
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
                Section::make('Expense general information')
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
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ])
                            ->required(),
                        TextInput::make('sum')
                            ->label(__('expense.fields.sum'))
                            ->prefixIcon('tabler-pig-money')
                            ->numeric()
                            ->minValue(0)
                            ->required()
                            ->columnSpan([
                                'default' => 12,
                                'sm' => 6,
                                'md' => 6,
                                'lg' => 6,
                            ]),
                        Textarea::make('description')
                            ->label(__('expense.fields.description'))
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

        return redirect()->route('filament.admin.resources.expense-categories.index');
    }

    protected static string $view = 'filament.resources.expenses-resource.pages.custom-expense-create';
}
