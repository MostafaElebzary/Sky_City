<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','rate','description','advertising_id'
    ];

    public function advertising()
    {
        return $this->belongsTo(Advertising::class, 'advertising_id');
    }

}
