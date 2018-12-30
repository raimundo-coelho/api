<?php

namespace IDEALE\Models;

use IDEALE\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use TenantModels;

    protected $fillable = [
        'feedback',
        'user_id',
        'course_id',
        'evaluation',
        'evaluated',
        'done',
        'date_due',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
