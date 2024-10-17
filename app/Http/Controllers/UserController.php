<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function listAll() {
        $users = User::all();
        return view('usuarios', compact('users'));
    }

    public function formAddUser() {
        return view('adiciona-usuarios');
    }

    public function addUser(Request $request) {

        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|integer',
            'password' => 'required|confirmed|min:8|max:20',
        ]);

        try{
            $new_user = new User();
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('usuarios')->with('success', 'Usuário Adicionado!');
        } catch (\Exception $e) {

            return redirect('usuarios/adicionar-usuario')->with('fail', 'Erro ao adicionar usuário. ' . $e->getMessage());
        }
    }

    public function deleteUser($iduser) {
        
        try {
            User::where('id', $iduser)->delete();
            return redirect('/usuarios')->with('success', 'Usuario Deletado!');
        } catch (\Exception $e) {

            return redirect('/usuarios')->with('fail', 'Erro ao deletar usuario. ' . $e->getMessage());
        }
    }

    public function formUpdateUser($iduser) {
        
        $user = User::find($iduser); 

        return view('edita-usuarios', compact('user'));
    }

    public function updateUser(Request $request){

        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'phone_number' => 'required|integer',
            'password' => 'required|confirmed|min:8|max:20',
        ]);

        try{
            $update_user = User::where('id', $request->user_id)->update([
                'name'          => $request->full_name,
                'email'         => $request->email,
                'phone_number'  => $request->phone_number,
                'password'      => $request->password,
            ]);

            return redirect('/usuarios')->with('success', 'Usuario Atualizado!');
        } catch (\Exception $e) {

            return redirect('/usuarios/editar-usuario')->with('fail', 'Erro ao atualizar usuario. ' . $e->getMessage());
        }
    }
}
