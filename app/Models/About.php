<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'about';

    // Primary key for the model (optional if different from the default 'id')
    protected $primaryKey = 'email';

    // Disable auto-incrementing since we're using composite keys or non-incrementing primary key
    public $incrementing = false;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'bio',
        'social_links',
    ];

    // Cast the 'social_links' attribute as an array when accessed
    protected $casts = [
        'social_links' => 'array',
    ];

    // Timestamps are handled by Laravel by default, no need to define created_at and updated_at
    // However, if you want custom column names for timestamps, you can define them here
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}
