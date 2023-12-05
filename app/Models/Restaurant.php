<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'address', 'description', 'vat_number', 'image', 'type_id'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }
}