<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jra extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategory(){
        return $this->belongsTo(Kategory::class);
    }   
}
