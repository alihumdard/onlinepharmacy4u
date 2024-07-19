<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['product_id', 'image', 'status', 'created_by', 'updated_by'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
