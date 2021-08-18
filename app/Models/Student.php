<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'password',
        'cpf',
        'email',
        'phone',
        'cep',
        'street',
        'house_number',
        'district',
        'city',
        'state',
        'photo'
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

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class, 'student_id', 'id')->with('classes');
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class, 'student_id', 'id');
    }
}
