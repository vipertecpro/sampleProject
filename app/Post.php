<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'slug',
        'summary',
        'content',
        'type',
        'status',
    ];
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
