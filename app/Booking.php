<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';

    protected $dates = [
        'time_to',
        'time_from',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'time_to',
        'owner_id',
        'time_from',
        'created_at',
        'updated_at',
        'deleted_at',
        'room_name_id',
        'meeting_duration',
        'notification_mail',
        'resources_needed_id',
        'number_of_participants',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function room_name()
    {
        return $this->belongsTo(Boardroom::class, 'room_name_id');
    }

    public function getTimeFromAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimeFromAttribute($value)
    {
        $this->attributes['time_from'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getTimeToAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimeToAttribute($value)
    {
        $this->attributes['time_to'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function resources_needed()
    {
        return $this->belongsTo(Resource::class, 'resources_needed_id');
    }
}
