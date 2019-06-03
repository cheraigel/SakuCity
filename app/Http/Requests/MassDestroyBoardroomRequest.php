<?php

namespace App\Http\Requests;

use App\Boardroom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyBoardroomRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('boardroom_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:boardrooms,id',
        ];
    }
}
