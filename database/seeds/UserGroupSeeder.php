<?php

use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'Administrator',
            'Staff'
        ];

        foreach ($groups as $group) {
            \App\UserGroup::create([
                'name' => $group
            ]);
        }
    }
}
