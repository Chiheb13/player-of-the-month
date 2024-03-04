<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\equipe;
use App\Models\compitition;
use App\Models\voter;

class player extends Model
{
    use HasFactory;
    protected $fillable=['name','image','postplayer','equipe_id'];

    public function equipe(){
        return $this->belongsTo(equipe::class);
    }
    public function compititions()
    {
        return $this->belongsToMany(compitition::class, 'player_compitition')->withPivot('note');
    }
    public function votes()
    {
        return $this->belongsToMany(voter::class, 'player_compitition_voter')->withPivot('note');
    }

}
