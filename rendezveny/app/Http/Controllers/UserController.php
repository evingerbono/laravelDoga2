<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function osszesAdat()
    {
        $adatok = Events::with('agencies')
            ->with('participates')
            ->get();

        return $adatok;
    }

    public function modosit(Request $request, $id)
    {
        $user = Auth::user();
        DB::update("UPDATE participates SET present='$request->state' WHERE event_id=$id AND user_id=$user->id");
    }

    public function jelen($country)
    {
        $userId = Auth::id();
        $events = Events::whereHas('participates', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->where('present', true);
        })
            ->whereHas('agencies', function ($query) use ($country) {
                $query->where('country', $country);
            })
            ->get();

        return $events;
    }
}
