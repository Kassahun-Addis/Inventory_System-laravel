<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wastage extends Model
{
    use HasFactory;

    protected $table = 'wastages';

    protected $primaryKey = 'WastageID'; // Use if the primary key is not 'id'

    public $timestamps = false; // Set to true if you want Laravel to manage created_at and updated_at

    protected $fillable = [
        'Product_name',
        'Quantity',
        'WastageDate',
        'Reason',
        'unit',
    ];
}
