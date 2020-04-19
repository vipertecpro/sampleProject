<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    protected $table = 'medias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'path',
        'file_type',
        'file_size',
    ];
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
