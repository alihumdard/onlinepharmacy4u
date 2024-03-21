<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'name',
        'desc',
        'publish',
        'status',
        'created_by',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
