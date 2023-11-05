<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::factory(50)->raw();

        foreach (array_chunk($members, 5) as $data) {
            Member::query()->insert($data);
        }
    }
}
