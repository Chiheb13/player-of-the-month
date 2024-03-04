<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\player;

class voter extends Model
{
    use HasFactory;
    protected $fillable=['phone','name'];
    public function votes()
    {
        return $this->belongsToMany(player::class, 'player_compitition_voter')->withPivot('note');
    }
    public function hasVotedForCompetition($competitionId)
    {
        return $this->votes()->wherePivot('compitition_id', $competitionId)->exists();
    }
}
