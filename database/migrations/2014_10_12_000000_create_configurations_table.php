<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        $adminModulesList = explode('|', env('ADMIN_PANEL_MODULES'));
        if(in_array('users',$adminModulesList, true)){
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
        }
        if(array_intersect($adminModulesList, ['categories','tags'])) {
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
        }
        if(array_intersect($adminModulesList, ['blogs','news'])){
            Schema::create('posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->bigInteger('parent_id')->default(0);
                $table->string('title');
                $table->string('slug');
                $table->longText('summary');
                $table->longText('content');
                $table->enum('type',[
                    'blog','news'
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
        }
        if(in_array('media',$adminModulesList, true)){
            Schema::create('medias', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->default(0);
                $table->longText('path');
                $table->string('file_type');
                $table->string('file_size');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('taxonomies');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_metas');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('post_comments');
        Schema::dropIfExists('medias');
    }
}
