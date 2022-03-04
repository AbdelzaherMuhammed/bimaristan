<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * attributes that are mass assignable.
     */
    protected $fillable = [
        'original', 'optimized', 'sm', 'md', 'lg', 'imageable_id', 'imageable_type'
    ];


    /**
     * Get the owning imageable model.
     */
    public function imageable()
    {
        return $this->morphTo();
    }

}