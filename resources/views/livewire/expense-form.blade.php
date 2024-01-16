<x-card>
    <form wire:submit='{{ $form->method }}' class="space-y-2">
        <p class="text-2xl dark:text-white text-zinc-800">Gasto</p>

        <div>
            <label for="form.name" class="dark:text-white text-zinc-800">Nombre del gasto</label>
            <input required wire:model='form.name' class="w-full rounded-lg dark:bg-zinc-900 dark:text-white"
                placeholder="Netflix" />
        </div>

        <div>
            <label for="form.cost" class="dark:text-white text-zinc-800">Costo</label>
            <input type="number" required min="0" step=".01" wire:model='form.cost'
                class="w-full rounded-lg dark:bg-zinc-900 dark:text-white" placeholder="$299" />
        </div>

        <div>
            <label for="form.category" class="dark:text-white text-zinc-800">Categoria</label>
            <select class="w-full rounded-lg dark:bg-zinc-900 dark:text-white" wire:model="form.category">
                <option value="0">-- Seleccionar --</option>
                @foreach ($categories as $value => $text)
                    <option value="{{ $value }}">{{ $text }}</option>
                @endforeach
            </select>
        </div>

        <button class="w-full px-4 py-2 mb-6 text-white bg-amber-600 hover:bg-amber-700 rounded-xl">Guardar</button>
    </form>
</x-card>
