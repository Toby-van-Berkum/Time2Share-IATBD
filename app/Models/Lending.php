<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'lender_id',
        'borrower_id',
        'start_date',
        'end_date',
        'status'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function lender() {
        return $this->belongsTo(User::class, 'lender_id');
    }

    public function borrower() {
        return $this->belongsTo(User::class, 'borrower_id');
    }

    public function reviews() {
        return $this-hasMany(Review::class);
    }
}
