<?php

namespace App\Http\Requests;

use App\Booking;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('booking_create');
    }

    public function rules()
    {
        return [
            'owner_id'     => [
                'required',
                'integer',
            ],
            'room_name_id' => [
                'required',
                'integer',
            ],
            'time_from'    => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'time_to'      => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
