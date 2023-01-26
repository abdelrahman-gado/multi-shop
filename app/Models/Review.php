<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public const PAGINATION_COUNT = 5;

    public static $rules = [
        'review' => 'required',
        'rating' => 'required|decimal:1|min:0|max:5',
        'name' => 'required',
        'email' => 'required|email'
    ];

    protected $guarded = ['id'];

    function product() {
        return $this->belongsTo(Product::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

}
