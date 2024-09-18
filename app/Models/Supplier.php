<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'address',
        'contact_person',
        'phone_no',
        'email',
        'tin_no',
        'product_type',
    ];

    public $timestamps = false; // Set to true if you want Laravel to manage created_at and updated_at
}