<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, if it's the default)
    protected $table = 'experiences';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'role',
        'company_name',
        'description',
        'start_date',
        'end_date',
    ];
}
