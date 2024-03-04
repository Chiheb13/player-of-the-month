<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\player;

class equipe extends Model
{
    use HasFactory;
    protected $fillable=['name','logo'];

    public function players(){
        return $this->hasMany(player::class);
    }
}
