<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $primaryKey = 'ShipmentID'; // Use if the primary key is not 'id'

    public $timestamps = false; // Set to true if you want Laravel to manage created_at and updated_at

    protected $fillable = [
        'Assigned_person',
        'Carrier',
        'ShipmentDate',
        'TrackingNumber',
        'ShippingAddress',
        'ShippingCost',
        'Status',
    ];
}


