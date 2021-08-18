<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'classes_id',
        'value',
        'discount',
        'final_value',
        'status',
        'payment_method',
        'start_date',
        'end_date',
        'payday',
        'invoice',
        'payment_slip',
        'transaction_code',
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

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id', 'id')->with('courses');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function enrollmentobservations()
    {
        return $this->hasMany(EnrollmentObservations::class, 'enrollment_id', 'id');
    }
}
