<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cased extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'customer_id', 'user_id', 'case_name', 'qty', 'status', 'expire', 'description'];
    

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeInfo($query)
	{
    	return $query->with('product', 'customer', 'user');
	}

    public function scopeOpencase($query)
    {
        //return $query->info()->where('expire', '<=', date("Y-m-d"));
        return $query->info()->where('status', 'open');
    }

    public function scopeClosecase($query)
    {
        //return $query->info()->where('expire', '<=', date("Y-m-d"));
        return $query->info()->where('status', 'close');
    }

    public function scopeNotification($query,$id) 
    {
        return $query->where('user_id', $id)->where('status', 'open');
    }


}
