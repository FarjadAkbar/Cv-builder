<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    use HasFactory;
    protected $table = 'basic_information';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'profession',
        'website',
        'post_code',
        'division',
        'address',
    ];
}
