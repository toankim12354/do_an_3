<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  
    use HasFactory, Notifiable;
   
    protected $fillable = [
        'ID_majors',
        'Ten_Khoa_Hoc',
        'Tg_Bd',
        'Tg_Kt'
       
    ];

    /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function major()
    {
        return $this->belongsTo(Major::class, 'ID_majors', 'id');
    }
    /**
     * Get all of the comments for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lop()
    {
        return $this->hasMany(Lop::class, 'Khoa_id', 'id');
    }
}
