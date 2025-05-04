<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',                // e.g., 'sales', 'inventory'
        'status',              // 'pending', 'processing', 'completed', 'failed'
        'user_id',
        'file_path',           // 'public/reports/123.pdf'
        'file_format',         // e.g., 'pdf'
        'file_size',           // in bytes
        'start_date',
        'end_date',
        'parameters',          // JSON for dynamic fields
        'created_at',        // timestamp when file was generated
        'generation_time',     // in seconds
    ];

    protected $casts = [
        'parameters' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'created_at' => 'datetime',
    ];

    /**
     * User who requested the report
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Whether the report is ready for download
     */
    public function isReady()
    {
        return $this->status === 'completed' && $this->file_path;
    }

    /**
     * Get the full public URL of the report file
     */
    public function fileUrl(): ?string
    {
        return $this->file_path ? asset('storage/' . str_replace('public/', '', $this->file_path)) : null;
    }
}
