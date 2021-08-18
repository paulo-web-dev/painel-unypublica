<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'course_id',
        'start_date',
        'end_date',
        'type',
        'status',
        'confirmed'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function panels()
    {
        return $this->hasMany(Panel::class, 'classes_id', 'id')->with('video_lesson', 'material', 'questions', 'teachers');
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class, 'classes_id', 'id')->with('student', 'enrollmentobservations');
    }

}
