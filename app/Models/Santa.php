<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santa extends Model
{
    use HasFactory;

       protected $fillable =  [
        'title',
        'description',
        'image',
        'address',
        'isPrivate',
        'creator_id',
        'cost',
        'creationDate',
        'draw_starts_at',
        'draw_expires_at'
        ];
    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id')->first();
    }


}
