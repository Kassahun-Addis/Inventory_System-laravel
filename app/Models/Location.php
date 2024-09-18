<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $primaryKey = 'location_id'; // Use if the primary key is not 'id'

    public $timestamps = false; // Set to true if you want Laravel to manage created_at and updated_at

    protected $fillable = [
        'name',
        'description',
    ];
}
