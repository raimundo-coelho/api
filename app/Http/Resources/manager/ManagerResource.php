<?php

namespace IDEALE\Http\Resources\manager;

use Illuminate\Http\Resources\Json\JsonResource;

class ManagerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'feedback' => $this->feedback,
            'user_id' => $this->user_id,
            'course_id' => $this->course_id,
            'evaluation' => $this->evaluation,
            'evaluated' => (bool)$this->evaluated,
            'done' => (bool)$this->done,
            'date_due' => $this->date_due,
        ];
    }
}