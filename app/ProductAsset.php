<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAsset extends Model
{
    use SoftDeletes;
    protected $table = 'product_assets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'asset_type',
        'asset_url',
        'sequence_number',
    ];
    public function product(): HasOne
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
