<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        Role::create([
           'id'             => 1,
           'name'           => 'Admin',
           'slug'           => 'admin',
           'parent_id'      => 0
        ]);
        Role::create([
            'id'             => 2,
            'name'           => 'User',
            'slug'           => 'user',
            'parent_id'      => 0
        ]);
        $getAdminRole = Role::where('slug','admin')->first();
        $routes = array_keys(Route::getRoutes()->getRoutesByName());
        foreach ($routes as $key){
            if(!Str::of($key)->contains('ignition')){
                $pName = Str::of($key)->replace('.',' ')->ucfirst();
                Permission::updateOrCreate([
                    'name'  => $pName,
                    'slug'  => Str::slug($pName)
                ],[
                    'name'  => $pName,
                    'slug'  => Str::slug($pName)
                ])
                ->roles()
                ->attach($getAdminRole);
            }
        }
        $getAllPermissions = Permission::all()->pluck('id')->toArray();
        Role::where('slug','admin')->first()->permissions()->sync($getAllPermissions);
        $getUserRole = Role::where('slug','user')->first();

        $adminUser = User::create([
            'firstName'         => 'Admin',
            'lastName'          => 'Admin',
            'username'          => 'admin',
            'mobile'            => '+918290027417',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123465789'), // password
            'remember_token'    => Str::random(10),
        ]);
        $adminUser->roles()->attach($getAdminRole);
        $adminUser->permissions()->attach($getAllPermissions);
        factory(User::class, 50)->create()->each(function ($user) use ($getUserRole){
            $user->roles()->attach($getUserRole);
        });
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
