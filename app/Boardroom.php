<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boardroom extends Model
{
    use SoftDeletes;

    public $table = 'boardrooms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'location',
        'capacity',
        'room_name',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];
}
