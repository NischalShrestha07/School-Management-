<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    // below changes is made to add admin guard in database
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'academic_year_id',
        'class_id',
        'father_name',
        'mother_name',
        'admission_date',
        'dob',
        'mobno',
        'role'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function studentClass()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function studentAcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
}
