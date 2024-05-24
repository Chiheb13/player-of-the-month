<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipe;
use Illuminate\Support\Facades\DB;

class equipeController extends Controller
{
    public function equipe(){
        return view('equipe.addequipe');
    }
    public function addEquipe(Request $request)
    {
        $equipe = new equipe([
            'name' => $request->name,
        ]);
    
        if ($request->has('logo')) {
            $image = $request->logo;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $imageName);
            $equipe['logo'] = $imageName;
        }
    
        equipe::create($equipe->toArray());
    
        return redirect()->route('showtableequipe')->with('success', 'equipe added successfully');
    }
    public function showtableequipe()
{
    //$data = DB::table('equipes')->get();//query builder
    $data=equipe::select("*")->get();//elequent model
    return view('equipe.tableequipe', compact('data'));
}
public function edit($id){
    $data=equipe::select('*')->find($id);
    return view('equipe.updateequipe',(['data'=>$data]));
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $equipe = [
        'name' => $request->input('name'),
        
    ];

    if ($request->has('logo')) {
        $image = $request->file('logo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads', $imageName);
        $equipe['logo'] = $imageName;
    }

    $rowsAffected = equipe::where('id', $id)->update($equipe);

    if ($rowsAffected > 0) {
        return redirect()->route('showtableequipe')->with('valider', 'Equipe updated successfully');
    } else {
        return redirect()->route('showtableequipe')->with('error', 'Failed to update equipe');
    }
}
public function delete($id)
    {
        DB::table('equipes')->where('id',$id)->delete();
        return redirect()->route('showtableequipe');
    }


}
