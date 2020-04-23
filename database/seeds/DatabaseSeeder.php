<?php

use App\Media;
use App\Permission;
use App\Post;
use App\Product;
use App\Role;
use App\Taxonomy;
use App\Theme;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
        Artisan::call('resource:link');
        Artisan::call('storage:link');
        Storage::disk('public')->makeDirectory('media/images');
        Storage::disk('public')->makeDirectory('media/documents');

        updateThemes();
        Theme::where('name','default')->update([
            'activate'  => 'true'
        ]);
        $getTheme = Theme::where('activate','true')->first();
        if($getTheme !== null){
            if(file_exists(public_path('assets')) && is_link(public_path('assets'))){
                unlink(public_path('assets'));
            }
            File::link(resource_path('views/themes/'.$getTheme->name.'/assets'), public_path('assets'));
        }
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
            'parent_id'      => 1
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
        factory(Taxonomy::class,50)->create();
        factory(Post::class,50)->create();
        factory(Media::class,50)->create();
        factory(Product::class,50)->create();
    }
}
