<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['ticket_name', 'case_id', 'status', 'user_id', 'description', 'assigned_id'];
    
    protected $appends = ['user', 'customer', 'product'];

    public function cased() {
        return $this->belongsTo('App\Cased', 'case_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getUserAttribute() {
        return $this->cased->user;
    }

    public function getCustomerAttribute() {
        return $this->cased->customer;
    }

    public function getProductAttribute() {
        return $this->cased->product;
    }

    public function scopeInfo($query)
	{
    	return $query->with('cased', 'user');
	}

    public function scopeNotification($query,$id) 
    {
        return $query->where('assigned_id', $id)->where('status', 'open');
    }

}
