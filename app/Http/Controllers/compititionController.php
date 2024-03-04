<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compitition;
use Illuminate\Support\Facades\DB;

class compititionController extends Controller
{
    public function formcompitition()
{
    $compititions = DB::table('compititions')->get();
    $players = DB::table('players')->get();
    return view('compitition.formcompitition', compact('compititions','players'));
}
public function createcompitition(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'player_id' => 'required|array|min:5|exists:players,id',
        ]);

        // Create the competition
        $competition = new Compitition();
        $competition->name = $request->name;
        $competition->date_debut = $request->date_debut;
        $competition->date_fin = $request->date_fin;
        $competition->save();

        // Attach players to the competition
        $competition->players()->attach($request->player_id);

        return redirect()->route('showcompititiontable')->with('success', 'Competition created successfully.');
    }



   public function showcompititiontable()
{
    //$data = DB::table('equipes')->get();//query builder
    $data=compitition::select("*")->get();
    
    return view('compitition.tablecompitition', compact('data'));
}
public function updateformcompitition($id){
    $players = DB::table('players')->get();
    $data=compitition::select('*')->find($id);
    
    return view('compitition.updateformcompitition',compact('data','players'));
}
public function updatecompitition(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after:date_debut',
        'player_id' => 'required|array|min:5|exists:players,id',
    ]);

    $competition = Compitition::find($id);
    $competition->name = $request->name;
    $competition->date_debut = $request->date_debut;
    $competition->date_fin = $request->date_fin;
    $competition->save();


    $competition->players()->sync($request->player_id);

    return redirect()->route('showcompititiontable')->with('success', 'Competition updated successfully.');
}



public function deletecompitition($id)
    {
        DB::table('compititions')->where('id',$id)->delete();
        return redirect()->route('showcompititiontable');
    }
    public function activateCompetition($id)
    {
        $competition = compitition::find($id);

        if ($competition) {
            $competition->update(['is_activated' => 1]);
            return redirect()->back()->with('success', 'Competition deactivated successfully.');
        }

        return redirect()->back()->with('error', 'Competition not found.');
    }

    public function deactivateCompetition($id)
    {
        $competition = compitition::find($id);

        if ($competition) {
            $competition->update(['is_activated' => 0]);
            return redirect()->back()->with('success', 'Competition activated successfully.');
        }

        return redirect()->back()->with('error', 'Competition not found.');
    }
    public function calculatePlayerScores($compititionId)
    {
        $compitition = Compitition::findOrFail($compititionId);
        $players = $compitition->players;

        foreach ($players as $player) {
            $votes = $player->votes()->where('compitition_id', $compitition->id)->pluck('note');

            $averageScore = $votes->avg();
            $compitition->players()->updateExistingPivot($player->id, ['note' => $averageScore]);
        }
    
        return redirect()->back()->with('valider', 'results added with successfully .');
    }
    

}
