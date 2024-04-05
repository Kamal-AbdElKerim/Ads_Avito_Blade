<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $fillable = [
        'SenderID',
        'ReceiverID',
       'AdID',
       'MessageText',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'SenderID');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'ReceiverID');
    }

    public function ad()
    {
        return $this->belongsTo(ad::class, 'AdID');
    }
}
