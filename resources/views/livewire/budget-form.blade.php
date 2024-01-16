<x-card>
    <form wire:submit='{{ $form->method }}' class="space-y-2">
        <label for="" class="text-2xl dark:text-white text-zinc-800">Presupuesto mensual</label>
        <input type="number" required min="0" step=".01" wire:model='form.budget'
            class="w-full rounded-lg dark:bg-zinc-900 dark:text-white" placeholder="$40,000" />

        <button class="w-full px-4 py-2 mb-6 text-white bg-amber-600 hover:bg-amber-700 rounded-xl">Guardar</button>
    </form>
</x-card>
