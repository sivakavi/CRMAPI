<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'dob', 'phone', 'mobile', 'email', 'gender', 'address1', 'address2', 'city', 'state', 'country', 'pincode', 'lead_source', 'occupation', 'image', 'interst', 'hot', 'membership_id'];

    public function scopeHot($query)
    {
        return $query->where('hot', 1);
    }

    public function membership()
    {
        return $this->belongsTo('App\Membership');
    }
}
