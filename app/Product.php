<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'prod_name', 'qty', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
