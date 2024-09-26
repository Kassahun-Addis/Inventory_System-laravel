<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name', 
        'company', 
        'address', 
        'phone_no', 
        'email', 
        'tin_no',
        'create_at'
    ];

    public $timestamps = false;
}
