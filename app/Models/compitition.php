<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\player;
use App\Models\voter;
class compitition extends Model
{
    use HasFactory;
    protected $fillable=['name','date_debut','date_fin','is_activated'];
public function players()
{
    return $this->belongsToMany(player::class, 'player_compitition')->withPivot('note');
}
public function votes()
{
    return $this->belongsToMany(voter::class, 'player_compitition_voter')->withPivot('note');
}

}