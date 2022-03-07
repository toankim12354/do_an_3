<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   
  
    protected $guard = 'teacher';

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'phone',
        'address',
        'email',
        'password',
        'status'
    ];
}
