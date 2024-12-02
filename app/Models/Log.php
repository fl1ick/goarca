<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $fillable = [
        'action', 'table_name', 'record_id', 'old_data', 'new_data'
    ];
}
