<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static updateOrCreate(array $array, array $getThemesName)
 */
class Theme extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'pages_path',
        'layout_path',
        'screenshot_path',
        'activate',
        'components'
    ];
}
