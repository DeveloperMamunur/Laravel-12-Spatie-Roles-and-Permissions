<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Edit Product') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Edit product') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route('products.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4">
            back
        </a>
        <div class="overflow-x-auto w-150 p-3 mt-4">
            <form wire:submit="update" class="mt-6 space-y-6">
                <flux:input wire:model="name" type="text" label="name" placeholder="Name" />
                <flux:textarea wire:model="details" type="details" label="Details" placeholder="Details" />

                <flux:button type="submit" variant="primary">Update</flux:button>
            </form>
        </div>
    </div>
</div>
