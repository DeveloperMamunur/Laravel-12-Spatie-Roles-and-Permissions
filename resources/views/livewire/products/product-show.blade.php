<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Show Product') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Show product details') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route('products.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4">
            back
        </a>
        <div class="overflow-x-auto w-150 p-3 mt-4">
            <p><span class="font-bold me-3">Name:</span>{{ $product->name }}</p>
            <p><span class="font-bold me-3">Detail:</span>{{ $product->details }}</p>
        </div>
    </div>
</div>
