<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Tags\HasTags;
use Te7aHoudini\LaravelTrix\Models\TrixRichText;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{
    use HasFactory;
    use HasTags;
    use HasTrixRichText;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trix_rich_texts(): HasMany
    {
        return $this->hasMany(TrixRichText::class, 'model_id')->where('model_type', self::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function postImagePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('storage/'.$value) : null,
        );
    }
}
