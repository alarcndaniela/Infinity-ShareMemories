<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['image', 'url', 'user_id', 'created_by', 'created_at'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

