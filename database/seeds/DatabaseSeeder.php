<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminModulesList = explode('|', env('ADMIN_PANEL_MODULES'));
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class, 50)->create();
        if(array_intersect($adminModulesList, ['categories','tags'])) {
            factory(\App\Taxonomy::class,50)->create();
        }
        if(array_intersect($adminModulesList, ['blogs','news'])) {
            factory(\App\Post::class,50)->create();
        }
        if(in_array('media', $adminModulesList, true)){
            factory(\App\Media::class,50)->create();
        }
    }
}
