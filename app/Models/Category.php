<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'slug',
        'status',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

}
