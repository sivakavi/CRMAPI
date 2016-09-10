<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['customer_id', 'user_id', 'app_date', 'app_time', 'status'];


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
    	return $query->with('customer', 'user');
	}

    public function scopeNotification($query,$id) 
    {
        return $query->where('user_id', $id)->where('status', 'open');
    }
}
