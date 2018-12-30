<?php

namespace IDEALE\Http\Resources\course;

use IDEALE\Http\Resources\CategoryResource;
use IDEALE\Http\Resources\lesson\LessonResource;
use IDEALE\Http\Resources\manager\ManagerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => (float)$this->price,
            'discount' => (integer)$this->discount,
            'price_discount' => (float)$this->price_discount,
            'plots' => (integer)$this->plots,
            'price_plots' => (float)$this->price_plots,
            'workload' => $this->workload,
            'status' => $this->status,
            'image' => $this->image,
            'banner' => $this->banner,
            'video_presentation' => $this->video_presentation,
            'description' => $this->description,
            'lessons' => LessonResource::collection($this->lessons),
            'manager' => ManagerResource::collection($this->manager),
            'category' => new CategoryResource($this->category),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
