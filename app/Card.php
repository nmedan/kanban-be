<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Column;

class Card extends Model
{
    protected $fillable = [
        'column_id',
    ];

    public function column()
    {
        return $this->belongsTo(Column::class);   
    }
}
