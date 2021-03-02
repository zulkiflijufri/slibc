<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'title' => 'Article One',
            'slug' => 'article-one',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quibusdam, cupiditate, qui quos delectus nemo, mollitia dolor natus omnis id ea optio doloremque provident incidunt vel cum error officia dolorum.',
        ]);

        Article::create([
            'title' => 'Article Two',
            'slug' => 'article-two',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quibusdam, cupiditate, qui quos delectus nemo, mollitia dolor natus omnis id ea optio doloremque provident incidunt vel cum error officia dolorum.',
        ]);
    }
}
