<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductStock extends Model
{
    //use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = [
        'product_name',
        'category',
        'quantity',
        'production_cost',
        'selling_price',
        'alert_quantity',
        'details_specification',
    ];
}

