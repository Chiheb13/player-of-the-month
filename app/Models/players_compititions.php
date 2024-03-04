<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class players_compititions extends Model
{
    use HasFactory;
    protected $fillable=['player_id','compititon_id','note'];
}
