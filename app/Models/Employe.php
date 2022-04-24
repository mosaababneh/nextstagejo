<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employe extends Authenticatable
{
     protected $table = 'employees';


    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Table Name
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function Company(){
        return $this->hasMany('App\Models\belongsTo','company_id');
    }
}
