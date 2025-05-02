<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'product.view',
            'product.create',
            'product.edit',
            'product.delete',
        ];

        foreach ($permissions as $key => $value) {
            Permission::create(['name' => $value]);
        }
    }
}
