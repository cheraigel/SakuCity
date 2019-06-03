<?php

namespace App\Http\Requests;

use App\Resource;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('resource_edit');
    }

    public function rules()
    {
        return [
            'name'       => [
                'required',
                'min:1',
                'max:50',
            ],
            'department' => [
                'required',
                'min:1',
                'max:50',
            ],
        ];
    }
}
