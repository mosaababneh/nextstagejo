<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['id'=>1],['name'=>'admin','email'=>'admin@admin.com','password'=>'$2y$10$LwKaPps5Ig1PeN.zg4WeQ.p2Ya20p4T51bwkiBTN.Aey7RqP1usui']);
    }
}
