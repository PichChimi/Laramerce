<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'title_cart',
        'short_desc',
        'title',
        'recent_1',
        'recent_2',
        'recent_3',
        'recent_4',
        'recent_5',
        'archive_1',
        'archive_2',
        'archive_3',
        'archive_4',
        'archive_5',
        'desc'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
