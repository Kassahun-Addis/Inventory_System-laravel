<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'expense_date',
        'expense_for',
        'amount',
        'expense_category',
        'expense_description',
    ];

    public $timestamps = false; // Set to true if you want Laravel to manage created_at and updated_at
}