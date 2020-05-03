<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_sku',
        'product_name',
        'product_slug',
        'product_short_desc',
        'product_long_desc',
        'product_price',
        'product_in_stock',
    ];
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function productAsset(): HasMany
    {
        return $this->hasMany(ProductAsset::class,'id','product_id');
    }
}
