<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UtilisateurController extends Controller
{
    public function index(){
        $users = User::all();
        return view('utilisateurs.index')->with([
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles=Role::all();
        return response()->json([
            'success' => true,
            'html' => view('utilisateurs.form')->with([
                'user' => $user,
                'roles'=>$roles,
                'title' => 'Modifier un Utilisateur',
                'action' => route('utilisateurs.update', $id),
            ])->render()
        ]);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'msg' => 'Utilisateur ' . $id . ' supprimé avec succès'
            ], 200);
            to_route('utilisateurs.index');
        }
        return response()->json([
            'success' => false,
            'msg' => 'Impossible de retrouver ce Utilisateur.'], 200);
    }


}

