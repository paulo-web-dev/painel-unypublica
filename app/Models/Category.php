<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'status'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

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
        return $this->belongsToMany(Course::class, 'category_courses', 'category_id', 'course_id')->with('classes');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_categories', 'category_id', 'question_id');
    }

}
