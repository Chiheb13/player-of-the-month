<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\player;

class joueurController extends Controller
{
    public function afficheplayer()
{
    $data = Player::with('equipe')->get();
    return view('player.playertable', compact('data'));//query builder
    
}
public function addplayer()
{
    $equipes = DB::table('equipes')->get();
    return view('player.addplayer', compact('equipes'));
}
public function createplayer(Request $request)
{
    $request->validate([
        'name' => 'required',
        'equipe_id' => 'required|exists:equipes,id', // Validate that the equipe_id exists in the equipes table
        'postplayer' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif',
    ]);

    $player = new player([
        'name' => $request->input('name'),
        'equipe_id' => $request->input('equipe_id'),
        'postplayer' => $request->input('postplayer'),
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move('uploads', $imageName);
        $player->image = $imageName;
    }

    $player->save();

    return redirect()->route('afficheplayer')->with('success', 'Player added successfully');
}
public function edit($id){
    $data=player::select('*')->find($id);
    $equipes = DB::table('equipes')->get();
    return view('player.updateplayer', compact('data', 'equipes'));
}
public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required',
        'postplayer' => 'required',
        'equipe_id' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $player = [
        'name' => $request->input('name'),
        
    ];

    if ($request->has('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads', $imageName);
        $player['image'] = $imageName;
    }

    $rowsAffected = player::where('id', $id)->update($player);

    if ($rowsAffected > 0) {
        return redirect()->route('afficheplayer')->with('valider', 'player updated successfully');
    } else {
        return redirect()->route('afficheplayer')->with('error', 'Failed to update equipe');
    }
}
public function delete($id)
    {
        DB::table('players')->where('id',$id)->delete();
        return redirect()->route('afficheplayer');
    }
}
