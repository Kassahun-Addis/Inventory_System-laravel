<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        
    ];
    public $timestamps = false; // Set to true if you want Laravel to manage created_at and updated_at
    
}
