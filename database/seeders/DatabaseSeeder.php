<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Storage::makeDirectory('posts');

        // Define la ruta del directorio
        $path = public_path('storage/posts');

        // Verifica si el directorio ya existe
        if (!File::exists($path)) {
            // Crea el directorio
            File::makeDirectory($path, 0755, true);
        }else{
            File::deleteDirectory($path, 0755, true);
        }

        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
