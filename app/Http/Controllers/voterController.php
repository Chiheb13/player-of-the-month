<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compitition; 
use App\Models\voter; 
use App\Rules\UniquePhone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class VoterController extends Controller
{
    public function registervoter()
    {
        return view('voter.registervoter');
    }

    public function voter()
{
    
    $competition = compitition::with('players')->latest()->first();
    if (!$competition) {
        return redirect()->route('veuillezPatienterPage');
    }
  

    if ($competition->is_activated == 1) {
        $currentDate = now(); 
        $endDate = $competition->date_fin;

        if ($currentDate > $endDate) {
        
            return redirect()->route('results', ['competitionId' => $competition->id]);
        }
        $players = DB::table('player_compitition')
        ->where('compitition_id', $competition->id)
        ->join('players', 'player_compitition.player_id', '=', 'players.id')
        ->select('players.*', 'player_compitition.note')
        ->orderByDesc('player_compitition.note')
        ->get();
        
    return view('compitition.results', compact('players', 'competition'));
    }

    $players = $competition->players;

    return view('voter.acceuil', compact('players', 'competition'));
}


    public function addvoter(Request $request)
    {
        $competition = compitition::find($request->compitition_id);
    
        if (!$competition) {
            return response('Competition not found');
        }
    
        if ($competition->is_activated == 1) {
            return redirect()->route('veuillezPatienterPage');
        }
    
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => ['required', 'min:8', function ($attribute, $value, $fail) use ($request) {
                $existingVoter = Voter::where('name', $request->input('name'))
                    ->where('phone', $request->input('phone'))
                    ->first();
    
                if ($existingVoter) {
                    $hasVotedForCompetition = $existingVoter->votes()
                        ->where('compitition_id', $request->compitition_id)
                        ->exists();
    
                    if ($hasVotedForCompetition) {
                        return redirect()->route('votedForThisCompetition', ['competitionId' => $request->compitition_id])->with('error', 'You have already voted for this competition.');
                    }
                }
            }],
            'notes.*' => 'required',
            'compitition_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $existingVoter = Voter::where('name', $request->input('name'))
            ->where('phone', $request->input('phone'))
            ->first();
        if (!$existingVoter) {
            $voter = new Voter();
            $voter->name = $request->input('name');
            $voter->phone = $request->input('phone');
            $voter->save();
        } else {

            $voter = $existingVoter;
        }
   
        $notes = $request->notes;
    
        foreach ($notes as $playerId => $note) {
            $existingVote = $voter->votes()
                ->where('compitition_id', $request->compitition_id)
                ->where('player_id', $playerId)
                ->exists();
    
            if (!$existingVote) {
                $voter->votes()->attach($playerId, ['note' => $note, 'compitition_id' => $request->compitition_id]);
            }
            else{
                return redirect()->route('votedForThisCompetition', ['competitionId' => $request->compitition_id])->with('error', 'You already voted for this compitition');
            }
        }
    
        return redirect()->route('votedForThisCompetition', ['competitionId' => $request->compitition_id])->with('valider', 'Your vote has been added successfully');
    }
    
    
public function veuillezPatienterPage(){
    return view('voter.veuillezPatienterPage');
}
public function votedForThisCompetition(Request $request, $competitionId)
{
    $competition = compitition::find($competitionId);

    if (!$competition) {
        abort(404);
    }

    $players = $competition->players;

    return view('voter.votedForThisCompetition', compact('competition', 'players'));
}

}