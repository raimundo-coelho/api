<?php

namespace IDEALE\Models;

use IDEALE\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use TenantModels;
    protected $fillable = [
        'name',
        'duration',
        'video_id',
        'user_id',
        'course_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
