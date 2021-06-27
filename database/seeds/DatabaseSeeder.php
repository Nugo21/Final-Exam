<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Nature',
                'status' => true,
                'description' => 'nature',
            ],
            [
                'title' => 'LifeStyle',
                'status' => true,
                'description' => 'lifestyle',
            ],
            [
                'title' => 'Fashion',
                'status' => true,
                'description' => 'fashion',
            ],
            [
                'title' => 'Sport',
                'status' => true,
                'description' => 'sport',
            ],
        ];

        $users=[
            [
                'name'=>'test',
                'email'=>'test@gmail.com',
                'password'=>Hash::make('12345'),
            ]
     ];
        User::insert($users);

        Category::insert($categories);
    }
}
