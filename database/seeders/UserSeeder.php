<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Holiq',
            'email' => 'holiq@gmail.com',
            'password' => '11111111',
        ]);

        $admin->syncRoles('super_admin');

        $users = User::factory(10)->raw();

        foreach (array_chunk($users, 2) as $data) {
            User::query()->insert($data);
        }

        $users = User::query()->get('id');
        $role = Role::findByName('admin');

        foreach ($users as $data) {
            $role->users()->sync($data->id);
        }
    }
}
