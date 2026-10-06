<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',
        'due_date',
        'priority',
        'category_id',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
            'due_date' => 'date',
        ];
    }

    /**
     * The user who owns this task.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The category of this task.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
