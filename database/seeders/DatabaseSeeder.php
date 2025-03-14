<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PostSeeder::class,
        ]);
        Post::all()->each(function($post){
            if(!$post->slug){
                $post->slug=Str::slug($post->title);
                $post->save();
            }
        });
        User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => 'password',
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@gmail.com',
            'password' => 'password',
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@gmail.com',
            'password' => 'password',
            'created_at' => now(),
        ]);
        
    }
}
