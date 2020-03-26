<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductField extends Model
{
    use SoftDeletes;
    protected $table = 'product_fields';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field_group_name',
        'field_group_slug',
    ];
}
