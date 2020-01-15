<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'from_date',
        'to_date', 
        'reason',
        'description',
        'leave_type',
        'pm_approved',
        'admin_approved',
        'pm_approved_date',
        'admin_approved_date',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
