<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'howLong'];

    public function goTest()
    {
        return $this->hasMany(Toys::class, 'id', 'id');
    }

}
