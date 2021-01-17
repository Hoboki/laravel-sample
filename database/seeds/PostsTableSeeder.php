<?php

use App\Models\Post;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    private $data = [
        'id', 'company_id', 'title', 'content', 'created_at', 'updated_at'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Post::class, 20)->create();
    }
}
