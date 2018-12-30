<?php

namespace IDEALE\Models;

use IDEALE\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // use TenantModels;

    protected $fillable = [
      'name',
      'price',
      'discount',
      'price_discount',
      'plots',
      'price_plots',
      'workload',
      'status',
      'image',
      'banner',
      'video_presentation',
      'brief_description',
      'long_description',
      'user_id',
      'category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function manager() {
        return $this->hasMany(Manager::class);
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

}
