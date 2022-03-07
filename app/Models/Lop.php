<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;
    protected $fillable = [
        'Ten',
        'Khoa_id'
    ];
      /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'Khoa_id', 'id');
    }
      /**
     * Get all of the comments for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student()
    {
        return $this->hasMany(Student::class, 'id_lop', 'id');
    }
}
