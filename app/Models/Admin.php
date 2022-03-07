<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Admin extends Model
{
    use HasFactory, Notifiable;
   
    protected $fillable = [
        'name',
        'dob',
        'gender',
        'phone',
        'address',
        'email',
        'password',
        'is_super'
    ];
    // protected $hidden = ['password', 'remember_token'];

    // // cast geder to string
    // public function getGenderAttribute($value)
    // {
    //     return $value ? "Nam" : "Nữ";
    // }

    // // convert Y-m-d to d-m-Y when get dob Attribute
    // public function getDobAttribute($value)
    // {
    //     return Carbon::createFromFormat('Y-m-d', $value)
    //                   ->format('d-m-Y');
    // }

    // // convert d-m-Y to Y-m-d when set dob Attribute
    // public function setDobAttribute($value)
    // {
    //     $this->attributes['dob'] = Carbon::parse($value)->format('Y-m-d');
    // }
}
