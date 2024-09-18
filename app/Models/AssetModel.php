<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    use HasFactory;

    protected $table = 'assets'; // Use 'assets' instead of 'asset_models'
    protected $fillable = [
        'asset_name',
        'category',
        'purchase_price',
        'status',
        'serial_no',
        'description',
        'assigned_to',
        'department',
        'purchase_date',
        'last_maintenance_date',
        'remark',
    ];
}

