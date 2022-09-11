<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone_numbers extends Model
{

    use HasFactory;
    protected $fillable = [
        'user',
        'first_name',
        'last_name',
        'phone_number',
    ];
}
