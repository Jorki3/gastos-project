<div class="space-y-4">
    <div>
        @if (!$userFinancial)
            <div class="space-y-4">
                <p class="font-bold text-center text-zinc-800 dark:text-white text-7xl">
                    <span class="text-violet-600">G</span>estor de <span class="text-amber-600">P</span>resupuesto
                </p>

                <div
                    class="w-full px-4 py-2 overflow-hidden text-center bg-white shadow-xl dark:bg-zinc-800 sm:rounded-lg">
                    <div class="text-center text-zinc-800 dark:text-white">
                        <p class="text-xl">
                            <span class="text-violet-600">¡Hola!</span> Registra tu <span
                                class="text-amber-600">presupuesto</span>
                            mensual
                        </p>
                        <p>
                            Dá clic al boton comenzar a registrar tus gastos y llevar una mejor salud monetaria.
                        </p>
                    </div>

                    <button wire:click="toggleBudgetForm"
                        class="p-4 mx-auto my-4 text-xl text-white rounded-full bg-violet-600 hover:bg-violet-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                            <path fill-rule="evenodd"
                                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @if ($userFinancial)
            <livewire:budget :userFinancial="$userFinancial">
        @endif
    </div>

    @if ($isOpenBudget)
        <div wire:transition wire:transition.out>
            <livewire:budget-form :userFinancial="$userFinancial" />
        </div>
    @endif

    @if ($isOpenExpense)
        <div wire:transition wire:transition.out>
            <livewire:expense-form :userFinancial="$userFinancial" :expense="$expense" />
        </div>
    @endif

    @if ($userFinancial)
        <livewire:expenses :userFinancial="$userFinancial">
    @endif
</div>
