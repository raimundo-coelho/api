<?php

namespace IDEALE\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:255',
            'duration' => 'required',
            'course_id' => [
                'required',
                (new Exists('courses','id'))
                    ->where('user_id', \Tenant::getTenant()->id)
            ]
        ];
    }

}
