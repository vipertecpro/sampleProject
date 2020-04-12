<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
        \App\Role::create([
           'name'           => 'Admin',
           'slug'           => 'admin',
           'parent_id'      => 0
        ]);
        $routes = array_keys(Route::getRoutes()->getRoutesByName());
        foreach ($routes as $key){
            if(!Str::of($key)->contains('ignition')){
                $pName = Str::of($key)->replace('.',' ')->ucfirst();
                DB::table('permissions')->updateOrInsert([
                    'name'  => $pName,
                    'slug'      => Str::slug($pName)
                ],[
                    'name'  => $pName,
                    'slug'  => Str::slug($pName)
                ]);
            }
        }
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
        if(in_array('products', $adminModulesList, true)){
            factory(\App\Product::class,50)->create();
        }
    }
}
