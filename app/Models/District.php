<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_title', 'en_title'
    ];

    protected $appends = ['title'];


    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
