<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $datas = ['deleted_at'];

    protected $fillable = ['name', 'slug', 'address', 'description', 'vat_number', 'image', 'type_id', 'order_id'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }


    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}