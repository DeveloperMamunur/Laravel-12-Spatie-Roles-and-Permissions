<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create new user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route('users.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4">
            back
        </a>
        <div class="overflow-x-auto w-150 p-3 mt-4">
            <form wire:submit="submit" class="mt-6 space-y-6">
                <flux:input wire:model="name" type="text" label="name" placeholder="Name" />
                <flux:input wire:model="email" type="email" label="Email" placeholder="email@example" />
                <flux:input wire:model="password" type="password" label="Password" placeholder="********" />
                <flux:input wire:model="password_confirmation" type="password" label="Password Confirmation" placeholder="********" />

                <flux:button type="submit" variant="primary">Submit</flux:button>
            </form>
        </div>
    </div>
</div>
