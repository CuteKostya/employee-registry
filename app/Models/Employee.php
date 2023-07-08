<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property string $name
 * @property integer $age
 * @property integer salary
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'id',
            'name',
            'age',
            'salary',
            'path',
        ];
}
