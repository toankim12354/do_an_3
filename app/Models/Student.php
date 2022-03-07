<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Student extends Model
{
    use HasFactory, Notifiable;
   
    protected $fillable = [
        'code',
        'name',
        'dob',
        'gender',
        'address',
        'email',
        'password',
        'phone',
        'id_lop'
       
    ];
     /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lop()
    {
        return $this->belongsTo(Lop::class, 'id_lop', 'id');
    }

}
