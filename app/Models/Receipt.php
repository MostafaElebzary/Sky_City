<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function ReceiptType(){
        return $this->belongsTo(ReceiptType::class , 'type')->withDefault([
            'title'=>''
        ]);
    }
}
