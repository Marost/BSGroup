<?php

use Illuminate\Database\Seeder;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Admin\BlogCategoria::class, 6)->create();

        factory(\App\Entities\Admin\BlogTag::class, 10)->create();

        factory(\App\Entities\Admin\BlogNoticia::class, 20)->create()->each(function ($n){{
            $tags = \App\Entities\Admin\BlogTag::all()->random()->id;
            $n->tags()->sync($tags);
        }});
    }
}