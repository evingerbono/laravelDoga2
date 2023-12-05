<?php

namespace App\Http\Controllers;

use App\Models\Agencies;
use Illuminate\Http\Request;

class AgenciesController extends Controller
{

    public function index()
    {
        return Agencies::all();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $agency = new Agencies();
        $agency->name = $request->name;
        $agency->country = $request->country;
        $agency->type = $request->type;
        $agency->save();
    }

    public function show($id)
    {
        return Agencies::find($id);
    }


    public function edit(Agencies $agencies)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        $agency = Agencies::find($id);
        $agency->name = $request->name;
        $agency->country = $request->country;
        $agency->type = $request->type;
        $agency->save();
    }

 
    public function destroy($id)
    {
        Agencies::find($id)->delete();
    }

    public function uj(){

    }
}
