<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'FirstName', 
        'LastName', 
        'phone_no', 
        'email', 
        'ContactInfo', 
        'Position',
        'Department', 
        'HireDate', 
    ];
    public $timestamps = false; // Add this line to disable timestamps

}
