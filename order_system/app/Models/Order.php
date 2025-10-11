<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // указываем, какие поля можно массово заполнять
    protected $fillable = [
        'hotel_id',
        'dep_id',
        'coor_id',
        'event_date',
        'work_start_time',
        'work_end_time',
        'workers_number',
        'venue_name',
        'event_start_time',
        'event_end_time',
        'guests_number',
        'duty_content',
        'position',
        'comments'
    ];
}