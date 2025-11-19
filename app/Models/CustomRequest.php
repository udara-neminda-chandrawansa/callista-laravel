<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'furniture_type',
        'dimensions',
        'materials',
        'design_description',
        'reference_images',
        'budget',
        'status',
        'admin_notes',
        'quoted_price'
    ];

    protected $casts = [
        'reference_images' => 'array',
        'quoted_price' => 'decimal:2'
    ];

    /**
     * Get the status badge color
     */
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'reviewing' => 'info',
            'quoted' => 'primary',
            'approved' => 'success',
            'in_progress' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }

    /**
     * Get formatted status text
     */
    public function getStatusTextAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }
}
