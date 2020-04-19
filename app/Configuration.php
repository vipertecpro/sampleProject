<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use SoftDeletes;
    protected $table = 'configurations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'config_type',
        'config_key',
        'config_data',
    ];
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
