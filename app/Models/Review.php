<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'lending_id',
        'reviewer_id',
        'reviewee_id',
        'rating',
        'comment'
    ];

    public function lending() {
        return $this->belongsTo(Lending::class);
    }

    public function reviewer() {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewee() {
        return $this->belongsTo(User::class, 'reviewee_id');
    }
}
