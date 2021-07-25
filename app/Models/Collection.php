<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CollectionItem;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(CollectionItem::class);
    }
}
