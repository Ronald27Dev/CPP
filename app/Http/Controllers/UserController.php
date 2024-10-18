<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

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
    public function updateUser(Request $request){

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

    /**
     * Metodo de view do formulario de login
     * 
     * @return view
     */
    public function loginForm() {
        return view('login');
    }

    /**
     * Metodo que recebe valida e confere se login existe
     * 
     * @param Request $request
     * 
     * @var $credentials separa do request somente o email e senha para caso haja mais posições no array
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAuth(Request $request) {
        // dd('opa');
        $request->validate([
            "email"     => "required",
            "password"  => "required"
        ]);

        $credentials = $request->only("email", "password");

        if(Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect('login')->with('fail', 'E-mail ou Senha Incorretos! Tente Novamente');
        }
    }

    /**
     * Metodo que realiza o logout do usuário
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::logout();
        return redirect('/login')->with('success', 'Você foi desconectado com sucesso!');
    }

    /**
     * Metodo que exibe o formulário para "Esqueceu a Senha"
     * 
     * @return view
     */
    public function forgotPasswordForm() {
        return view('forgot');
    }

    /**
     * Metodo que envia um e-mail para redefinição de senha
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLink(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if($response == Password::RESET_LINK_SENT) {
            return redirect()->back()->with('success', 'Nós enviamos um link para seu email');
        }
        return redirect()->back()->with('fail', 'Erro ao gerar o link de recuperação de senha');
    }
}
