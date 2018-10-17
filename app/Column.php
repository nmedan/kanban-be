<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Card;

class Column extends Model
{
    protected $fillable = [
        'capacity',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

}
