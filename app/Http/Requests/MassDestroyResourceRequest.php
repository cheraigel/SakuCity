<?php

namespace App\Http\Requests;

use App\Resource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyResourceRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('resource_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:resources,id',
        ];
    }
}
