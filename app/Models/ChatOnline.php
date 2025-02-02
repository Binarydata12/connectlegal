<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatOnline extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment',
        'lawyer_id',
        'status',
        'complete',
        'any', //Any lawyer if user is not selected lawyer
        'reminder'
    ];

    public function lawyer() {
        return $this->belongsTo(Lawyer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
