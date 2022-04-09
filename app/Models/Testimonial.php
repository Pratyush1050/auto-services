<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    use HasFactory;
    
    protected $fillable =['name','description','image'];
    /**
     * Limits the description to 50 characters
     *
     * @return void
     */
    public function limitDescription()
    {
        return Str::limit($this->description, 50, '...');
    }
}
