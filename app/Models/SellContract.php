<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellContract extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function owner()
    {
       return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function client()
    {
       return $this->belongsTo(Client::class, 'client_id');
    }

    public function ad()
    {
      return  $this->belongsTo(Advertising::class, 'ad_id');
    }
}
