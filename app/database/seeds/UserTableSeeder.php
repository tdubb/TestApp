<?php
class UserTableSeeder extends Seeder {
    public function run(){
        DB::table('users')->delete();

        User::create(array(
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ));

        User::create(array(
            'name' => 'Tyler',
            'email' => 'twasden@gmail.com',
            'password' => Hash::make('password')
        ));

        User::create(array(
            'name' => 'John',
            'email' => 'John@gmail.com',
            'password' => Hash::make('password')
        ));
    }
}