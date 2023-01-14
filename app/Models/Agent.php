<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'image',
        'address',
        'phone'
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)){
            return asset('uploads/agents').'/'.$image;
        }
        return asset('uploads/admins/default.jpg');
    }

    public function setImageAttribute($image)
    {

        if (is_file($image)) {
            $imageFields = upload($image, 'agents');
            $this->attributes['image'] = $imageFields;

        }

    }

}
