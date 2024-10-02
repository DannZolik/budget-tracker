<a href="{{ route('filament.admin.resources.expense-categories.index') }}">
    <x-filament-widgets::widget>
        <x-filament::section
            class="hover:bg-red-600 dark:hover:bg-white transition-colors duration-300 flex items-center group justify-center h-full">
            <div class="flex flex-col items-center font-bold text-xl group-hover:text-white dark:group-hover:text-red-600">
                <x-tabler-basket-plus class="h-10 w-10 mb-2" />
                add expense
            </div>
        </x-filament::section>
    </x-filament-widgets::widget>
</a>
