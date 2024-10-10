<?php

namespace JJCS\CMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JJCS\CMS\Enums\ContentType;

class Category extends Model
{
    use HasFactory;

    public function content(ContentType $type = null): HasMany
    {
        return $this->hasMany(Content::class)
            ->when($type, fn($c) => $c->where('type', $type));
    }
}
