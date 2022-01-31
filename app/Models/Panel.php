<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;

    protected $table = 'panels';

    protected $fillable = [
        'classes_id',
        'title',
        'subtitle',
        'content'
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


    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id', );
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id', 'id');
    }

    public function video_lesson()
    {
        return $this->belongsToMany(VideoLesson::class, 'video_lessons_panels', 'panel_id', 'video_lesson_id');
    }

    public function material()
    {
        return $this->belongsToMany(Material::class, 'material_panels', 'panel_id', 'material_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_panels', 'panel_id', 'question_id')->with('alternatives');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_panels', 'panel_id', 'teacher_id');
    }
}
