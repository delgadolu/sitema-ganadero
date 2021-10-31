<?php

use Illuminate\Database\Seeder;
use App\TypeUser;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeUser::create([
            'description' => "Master",
        ]);
        TypeUser::create([
            'description' => "Admin",
        ]);
    }
}
