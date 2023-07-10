<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 *
 */
class Option_answer extends Model
{
    use HasFactory, Notifiable;


    protected $fillable
        = [
            'answers_id', 'options_id', 'id',
        ];


}
