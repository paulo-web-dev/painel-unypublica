<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'value',
        'discount',
        'final_value',
        'status',
        'payment_method',
        'start_date',
        'end_date',
        'invoice',
        'wallet',
        'company'
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

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
