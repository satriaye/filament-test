<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'kategori_id',
        'date',
        'amount',
        'note',
        'image',
    ];

 public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

}
