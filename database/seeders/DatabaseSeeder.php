<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



        User::withoutEvents(function () {
            // Create 1 admin
            User::factory()->create([
                'name' => 'Deependra Adhikari',
                'email' => 'deep@gtech.com',
                'role' => 'admin',
            ]);

            // Create 3 users
            User::factory()->count(3)->create();
        });

        DB::table('categories')->insert([
            [
                'title' => 'Category 1',
                'slug' => 'category-1'
            ],
            [
                'title' => 'Category 2',
                'slug' => 'category-2'
            ],
            [
                'title' => 'Category 3',
                'slug' => 'category-3'
            ],
        ]);

        DB::table('tags')->insert([
            [
                'name' => 'Tag 1',
                'slug' => 'tag-1'
            ],
            [
                'name' => 'Tag 2',
                'slug' => 'tag-2'
            ],
            [
                'name' => 'Tag 3',
                'slug' => 'tag-3'
            ],
        ]);

        Post::withoutEvents(function () {
            foreach (range(1, 10) as $i) {
                Post::factory()->create([
                    'title' => 'Post ' . $i,
                    'slug' => 'post-' . $i,
                    'seo_title' => 'Post ' . $i,
                ]);
            }

        });


    }
}
