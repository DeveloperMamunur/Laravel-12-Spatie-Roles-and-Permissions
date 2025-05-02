<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Roles') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your all Roles') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        @session('success')
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400" role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        @endsession

        @can('role.create')
            <a href="{{ route('roles.create') }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Create Role
            </a>
        @endcan
        <div class="overflow-x-auto mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">permissions</th>
                        <th scope="col" class="px-6 py-3 w-80">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-2 font-medium text-gray-900 dark:text-white">{{ $role->id }}</td>
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300">{{ $role->name }}</td>
                            <td class="px-6 py-2 text-gray-600 dark:text-gray-300 flex flex-wrap gap-3">
                                @if ($role->permissions->isEmpty())
                                    <flux.badge class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">
                                        No Permissions
                                    </flux.badge>
                                @endif
                                @if ($role->permissions->isNotEmpty())
                                    @foreach ($role->permissions as $permission)
                                        <flux.badge class="inline-flex items-center px-3 py-2 text-sm font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-300">
                                            {{ $permission->name }}
                                        </flux.badge>
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-6 py-2 space-x-2">
                                @can('role.view')
                                    <a href="{{ route('roles.show', $role->id) }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Show
                                    </a>
                                @endcan
                                @can('role.edit')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                                        Edit
                                    </a>
                                @endcan
                                @can('role.delete')
                                    <button wire:click="delete({{ $role->id }})" wire:confirm="Are you sure you want to delete this user?" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        Delete
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
