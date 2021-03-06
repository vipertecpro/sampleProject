<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {

        Artisan::call('make:controller',[
            'name'  => 'Admin/CategoryController'
        ]);


        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('parent_id');
            $table->enum('config_type',explode('|',env('ADMIN_PANEL_MODULES')));
            $table->string('config_key');
            $table->longText('config_data');
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:controller',[
            'name'  => 'Admin/UserController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'User'
        ]);
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('username');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->primary(['user_id','permission_id']);
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('parent_id');
            $table->timestamps();
        });
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['user_id','role_id']);
        });
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->primary(['role_id','permission_id']);
        });



        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('pages_path')->unique();
            $table->string('layout_path')->unique();
            $table->string('screenshot_path')->unique();
            $table->longText('components')->nullable();
            $table->enum('activate',[
                'true',
                'false'
            ])->default('false');
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:controller',[
            'name'  => 'Admin/ThemeController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'Theme'
        ]);
        Artisan::call('make:controller',[
            'name'  => 'Admin/CategoryController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'Category'
        ]);
        Artisan::call('make:controller',[
            'name'  => 'Admin/TagController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'Tag'
        ]);
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->bigInteger('parent_id')->default(0);
            $table->enum('type',[
                'category','tag'
            ]);
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:controller',[
            'name'  => 'Admin/PostController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'Post'
        ]);
        Artisan::call('make:model',[
            'name'  => 'PostCategory'
        ]);
        Artisan::call('make:model',[
            'name'  => 'PostComment'
        ]);
        Artisan::call('make:model',[
            'name'  => 'PostMeta'
        ]);
        Artisan::call('make:model',[
            'name'  => 'PostTag'
        ]);
        Artisan::call('make:controller',[
            'name'  => 'Admin/NewsController'
        ]);
        Artisan::call('make:controller',[
            'name'  => 'Admin/PageController'
        ]);
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('parent_id')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->longText('summary');
            $table->longText('content');
            $table->enum('type',[
                'blog','news','page','product'
            ]);
            $table->enum('status',[
                'published','draft'
            ]);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('post_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id');
            $table->string('key');
            $table->longText('content');
            $table->timestamps();
        });
        Schema::create('post_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id');
            $table->bigInteger('tag_id');
            $table->timestamps();
        });
        Schema::create('post_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id');
            $table->bigInteger('category_id');
            $table->timestamps();
        });
        Schema::create('post_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(0);
            $table->bigInteger('post_id');
            $table->bigInteger('parent_id')->default(0);
            $table->string('title');
            $table->string('content');
            $table->enum('status',[
                'published','draft'
            ]);
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:controller',[
            'name'  => 'Admin/MediaController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'Media'
        ]);
        Schema::create('medias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(0);
            $table->longText('path');
            $table->string('file_type');
            $table->string('file_size');
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:controller',[
            'name'  => 'Admin/ProductController'
        ]);
        Artisan::call('make:model',[
            'name'  => 'Product'
        ]);
        Artisan::call('make:model',[
            'name'  => 'ProductAsset'
        ]);
        Schema::create('product_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id');
            $table->enum('asset_type',[
                'video','audio','document','image'
            ]);
            $table->longText('asset_url');
            $table->enum('is_visible',[
                'yes','no'
            ]);
            $table->bigInteger('sequence_number');
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:model',[
            'name'  => 'ProductFieldGroup'
        ]);
        Schema::create('product_field_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('field_group_name');
            $table->longText('field_group_slug');
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('make:model',[
            'name'  => 'ProductField'
        ]);
        Schema::create('product_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('field_type',[
                'text','table'
            ]);
            $table->string('field_key');
            $table->longText('field_value');
            $table->timestamps();
            $table->softDeletes();
        });
        Artisan::call('optimize:clear');
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        Artisan::call('auth:clear-resets');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        /*
         * Post|Categories|Tags|Comments|News Drops
         * */
        Schema::dropIfExists('post_metas');
        Schema::dropIfExists('post_comments');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('taxonomies');
        /*
         * Media Drop
         * */
        Schema::dropIfExists('medias');
        /*
        * Products Drop
        * */
        Schema::dropIfExists('product_fields');
        Schema::dropIfExists('product_field_groups');
        Schema::dropIfExists('product_assets');
        /*
         *  Default Drop
         * */
        Schema::dropIfExists('themes');
        Schema::dropIfExists('roles_permissions');
        Schema::dropIfExists('users_permissions');
        Schema::dropIfExists('users_roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('configurations');
    }
}
