<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Show Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Show Role details') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route('roles.index') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4">
            back
        </a>
        <div class="overflow-x-auto w-150 p-3 mt-4">
            <p><span class="font-bold me-3">Name:</span>{{ $role->name }}</p>
            <p class="flex flex-wrap gap-3"><span class="font-bold me-3">Permissions:</span>
                @if($role->permissions)
                    @foreach ($role->permissions as $permission)
                        <flux.badge class="inline-flex items-center px-3 py-2 text-sm font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-300">
                            {{ $permission->name }}
                        </flux.badge>
                    @endforeach
                @else
                    <span class="text-gray-500">No permissions assigned</span>
                @endif
            </p>
        </div>
    </div>
</div>
