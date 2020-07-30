<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        $this->command->info('Users table seeded!');
        
        $user =  \App\Models\User::find(1);//assuming the inserted user has id = 1
        $user->assignRole('Admin');
        $this->command->info('A User Assigned Admin Role');
    }


}
