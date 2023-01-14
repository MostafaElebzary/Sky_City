<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'advertising_id'
    ];
    protected $hidden =[
        'created_at',
        'updated_at'
    ];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Advertising') . '/' . $image;
        }
        return asset('uploads/Advertising/default.jpg');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Advertising');
            $this->attributes['image'] = $imageFields;
        }
    }


}
