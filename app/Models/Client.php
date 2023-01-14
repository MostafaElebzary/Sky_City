<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public function getImageAttribute($image)
    {
        if (!empty($image)){
            return asset('uploads/owners').'/'.$image;
        }
        return asset('uploads/admins/default.jpg');
    }

    public function setImageAttribute($image)
    {

        if (is_file($image)) {
            $imageFields = upload($image, 'owners');
            $this->attributes['image'] = $imageFields;

        }

    }
}
