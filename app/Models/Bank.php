<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

     // Specify the table if it's not 'banks'
     protected $table = 'banks';
    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'bank_id';

    // If the primary key is not an incrementing integer
    public $incrementing = false;

    protected $fillable = [
        'bank_name',
        'description',
        
    ];
}















