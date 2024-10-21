<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Metodo que view que lista os usuarios do sistema
     * 
     * @param User $user 
     * @return view
     */
    public function listAll() {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $users = User::all();
        return view('usuarios', compact('users'));
    }

    /**
     * Metodo view do formulario de registro de usuario
     * 
     * @return view
     */
    public function formAddUser() {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        return view('adiciona-usuarios');
    }

    /**
     * Metodo que recebe os dados do formulario de registro e faz o registro
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUser(Request $request) {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $request->validate([
            'full_name'     => 'required|string',
            'email'         => 'required|email|unique:users',
            'phone_number'  => 'required|integer',
            'password'      => 'required|confirmed|min:8|max:20',
        ]);

        try {
            User::create([
                'name'          => $request->full_name,
                'email'         => $request->email,
                'phone_number'  => $request->phone_number,
                'password'      => Hash::make($request->password),
            ]);

            return redirect('usuarios')->with('success', 'Usuário Adicionado!');
        } catch (\Exception $e) {

            return redirect('usuarios/adicionar-usuario')->with('fail', 'Erro ao adicionar usuário. ' . $e->getMessage());
        }
    }

    /**
     * Metodo que deleta usuarios
     * 
     * @param int $iduser que é o id do usuário
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($iduser) {
        
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        try {
            User::where('id', $iduser)->delete();
            return redirect('/usuarios')->with('success', 'Usuario Deletado!');
        } catch (\Exception $e) {

            return redirect('/usuarios')->with('fail', 'Erro ao deletar usuario. ' . $e->getMessage());
        }
    }

    /**
     * Metodo de view do formulario para edição de usuarios
     * 
     * @param User @user
     * 
     * @return view 
     */
    public function formUpdateUser($iduser) {
        
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $user = User::findOrFail($iduser);
        return view('edita-usuarios', compact('user'));
    }

    /**
     * Metodo que recebe o formulario de edição, valida e altera os dados do usuario
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request) {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $request->validate([
            'full_name'     => 'required|string',
            'email'         => 'required|email|unique:users,email,' . $request->user_id,
            'phone_number'  => 'required|integer',
            'password'      => 'required|confirmed|min:8|max:20',
        ]);

        try {
            $update_data = [
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ];

            //Checa se a senha tambem sera atualizada
            if ($request->password) {
                $update_data['password'] = Hash::make($request->password);
            }

            User::where('id', $request->user_id)->update($update_data);

            return redirect('/usuarios')->with('success', 'Usuario Atualizado!');
        } catch (\Exception $e) {

            return redirect('/usuarios/editar-usuario')->with('fail', 'Erro ao atualizar usuario. ' . $e->getMessage());
        }
    }
}
