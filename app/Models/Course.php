<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    protected $hidden = ['translations'];


    /**
     *
     *The attributes that are translatable.
     */
    public $translatedAttributes = ['name', 'description', 'notes'];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
