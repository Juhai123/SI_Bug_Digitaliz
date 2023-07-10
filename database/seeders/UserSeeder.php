<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        // ];

        // $user = User::create($data);
        // $user->assignRole('admin');

        //PIC Project
        $data = [
            'name' => 'M.Fajar Firdaus',
            'email' => 'fajar@gmail.com',
            'password' => Hash::make('fajar123'),
        ];

        $user = User::create($data);
        $user->assignRole('pic_project');
        // //------------------------------

        $data = [
            'name' => 'Hengki Dwiyan Hermawan',
            'email' => 'hengki@gmail.com',
            'password' => Hash::make('hengkidwiyan'),
        ];

        $user = User::create($data);
        $user->assignRole('pic_project');
        //-----------------
        //Programmer
        $data = [
            'name' => 'Ibnu Setiawan',
            'email' => 'Ibnu@gmail.com',
            'password' => Hash::make('ibnujahra'),

        ];

        $user = User::create($data);
        $user->assignRole('programmer');

        $data = [
            'name' => 'Junaidi Abdul Rahman',
            'email' => 'junaidi@gmail.com',
            'password' => Hash::make('junaidi'),
        ];

        $user = User::create($data);
        $user->assignRole('programmer');

    }
}
