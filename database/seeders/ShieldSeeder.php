<?php

namespace Database\Seeders;

use BezhanSalleh\FilamentShield\Support\Utils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            $rolesWithPermissions = json_decode('[{"name":"super_admin","guard_name":"web","permissions":["view_category","view_any_category","create_category","update_category","delete_category","delete_any_category","view_level","view_any_level","create_level","update_level","delete_level","delete_any_level","view_member","view_any_member","create_member","update_member","delete_member","delete_any_member","view_product","view_any_product","create_product","update_product","delete_product","delete_any_product","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_transaction","view_any_transaction","create_transaction","update_transaction","delete_transaction","delete_any_transaction","view_user","view_any_user","create_user","update_user","delete_user","delete_any_user","page_ReportSell"]},{"name":"admin","guard_name":"web","permissions":["view_transaction","view_any_transaction","create_transaction","update_transaction","page_ReportSell"]}]', true);

            $roleModels = [];
            $permissionModels = [];

            foreach ($rolesWithPermissions as $rolePlusPermission) {
                $roleModels[] = [
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ];

                if (! empty($rolePlusPermission['permissions'])) {
                    foreach ($rolePlusPermission['permissions'] as $permission) {
                        $permissionModels[] = [
                            'name' => $permission,
                            'guard_name' => 'web',
                        ];
                    }
                }
            }

            $permissionModels = array_map('unserialize', array_unique(array_map('serialize', $permissionModels)));

            Utils::getRoleModel()::insert($roleModels);

            Utils::getPermissionModel()::insert($permissionModels);

            foreach ($rolesWithPermissions as $rolePlusPermission) {
                $role = Utils::getRoleModel()::where('name', $rolePlusPermission['name'])->first();

                if ($role) {
                    $rolePermissions = Utils::getPermissionModel()::whereIn('name', $rolePlusPermission['permissions'])->get();
                    $role->syncPermissions($rolePermissions);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            throw ($e);
        }
    }
}
