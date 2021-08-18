<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'phone',
        'photo',
        'short_resume',
        'full_resume',
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
        return $this->belongsToMany(Panel::class, 'teacher_panels', 'teacher_id', 'panel_id');
    }
}
