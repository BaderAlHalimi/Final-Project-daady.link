<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'url',
        'redirect_url',
        'domain',
        'image_path',
        'clicks',
        'user_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
