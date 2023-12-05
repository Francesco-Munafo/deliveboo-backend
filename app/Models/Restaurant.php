<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'address', 'description', 'vat_number', 'image'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }
}
