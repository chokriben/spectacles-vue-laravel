<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $fillable = ['titre', 'flyer'];

    public function spectacles()
    {
        return $this->hasMany(Spectacle::class);
    }
}
