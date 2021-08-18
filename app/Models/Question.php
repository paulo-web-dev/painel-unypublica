<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'panel_id',
        'question_text',
        'category_id',
        'status'
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

    public function panels()
    {
        return $this->belongsToMany(Panel::class, 'question_panels', 'question_id', 'panel_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'question_categories', 'question_id', 'category_id');
    }

    public function alternatives()
    {
        return $this->hasMany(Alternative::class, 'question_id', 'id');
    }

}
