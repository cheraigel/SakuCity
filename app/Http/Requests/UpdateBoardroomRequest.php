<?php

namespace App\Http\Requests;

use App\Boardroom;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBoardroomRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('boardroom_edit');
    }

    public function rules()
    {
        return [
            'room_name' => [
                'required',
                'min:1',
                'max:50',
            ],
            'location'  => [
                'min:1',
                'max:50',
            ],
        ];
    }
}
