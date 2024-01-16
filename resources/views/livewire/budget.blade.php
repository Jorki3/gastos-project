<x-card>
    <div class="md:flex" x-init="formatAmounts" x-data="{ formattedAmountBudget: '', formattedAmountExpense: '', formattedAmountEnable: '' }">
        <div class="w-full md:w-1/2">
            <div class="mx-auto" x-data="{ chart: null }" x-init=" chart = new Chart(document.getElementById('myChart').getContext('2d'), {
                 type: 'doughnut',
                 data: {
                     labels: $wire.labels,
                     datasets: [{
                         label: 'Gasto',
                         data: $wire.data,
                         backgroundColor: $wire.bgColors,
                         borderWidth: 0
                     }]
                 },
                 options: {
                     responsive: true,
                     maintainAspectRatio: false,
                 }
             });">
                <canvas id="myChart" class="size-72"></canvas>
            </div>
        </div>

        <div class="w-full my-auto space-x-4 space-y-2 md:w-1/2">
            <p class="text-green-600" x-text="'Tu presupuesto mensual es de: ' + formattedAmountBudget"></p>
            <p class="text-red-600" x-text="'Tu gasto mensual es de: ' + formattedAmountExpense"></p>
            <p class="dark:text-white text-zinc-800"
                x-text="'Tu presupuesto disponible es de: ' + formattedAmountEnable">
            </p>

            <button wire:click="$parent.toggleBudgetForm"
                class="px-4 py-2 text-white rounded-lg bg-amber-600 hover:bg-amber-700">
                Editar presupuesto
            </button>

            <button wire:click="$parent.toggleExpenseForm"
                class="px-4 py-2 text-white rounded-lg bg-violet-600 hover:bg-violet-700">
                Agregar gasto
            </button>
        </div>
    </div>
</x-card>

<script>
    function formatAmounts() {
        const budget = {{ $userFinancial->budget }};
        const expense = {{ $userFinancial->expense }};
        const enable = {{ $userFinancial->budget - $userFinancial->expense }};

        const formatter = new Intl.NumberFormat('es-MX', {
            style: 'currency',
            currency: 'MXN'
        });

        this.formattedAmountBudget = formatter.format(budget);
        this.formattedAmountExpense = formatter.format(expense);
        this.formattedAmountEnable = formatter.format(enable);
    }
</script>

<script></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
