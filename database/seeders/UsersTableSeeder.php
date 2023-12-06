<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $clientRole = Role::where('name', 'client')->first();

        $admin = User::create([
            'name' => 'TripleTapLimited',
            'email' => 'tripletaplimitedkenya@gmail.com',
            'password' => Hash::make('@TripleTap2023*'),
        ]);

        $client = User::create([
            'fname' => 'Dummy',
            'lname' => 'Client',
            'email' => 'benthegreatonline@gmail.com',
            'password' => Hash::make('@TripleTap2023*'),
        ]);

        $admin->roles()->attach($adminRole);
        $client->roles()->attach($clientRole);
    }
}
