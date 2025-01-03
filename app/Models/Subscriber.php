<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows naming convention)
    protected $table = 'subscribers';

    // Specify the fields that are mass assignable
    protected $fillable = ['email'];
}
