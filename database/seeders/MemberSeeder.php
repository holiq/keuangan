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
        $members = Member::factory(100)->raw();

        foreach (array_chunk($members, 10) as $data) {
            Member::query()->insert($data);
        }
    }
}
