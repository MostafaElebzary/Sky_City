<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentContract extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        $this->belongsTo(Owner::class, 'owner_id');
    }

    public function client()
    {
        $this->belongsTo(Client::class, 'client_id');
    }

    public function ad()
    {
        $this->belongsTo(Advertising::class, 'ad_id');
    }
}
