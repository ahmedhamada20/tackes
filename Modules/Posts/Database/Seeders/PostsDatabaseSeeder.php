<?php

namespace Modules\Posts\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Posts\Entities\Post;

class PostsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Model::unguard();

        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();
        Post::factory()->count(2)->create();
        Schema::enableForeignKeyConstraints();
    }
}
