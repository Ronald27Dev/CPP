<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


/**
 * Controller responsavel pelas validações de login
 */
class AuthController extends Controller
{
    
    /**
     * Metodo de view do formulario de login
     * 
     * @return view
     */
    public function loginForm() {
        return view('login/login');
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
        return view('login/forgot');
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
        ], [
            'email.required' => __('validation.email_required'),
            'email.email' => __('validation.email_invalid'),
            'email.exists' => __('validation.email_not_found'),
        ]);
    
        $response = Password::sendResetLink(
            $request->only('email')
        );
    
        if ($response == Password::RESET_LINK_SENT) {
            return redirect('/login')->with('success', __('validation.reset_link_sent'));
        }
    
        return redirect()->back()->with('fail', __('validation.reset_link_failed'));
    }

    /**
     * Metodo que exibe o formulário para atualizar a senha
     * 
     * @param string $token é o token gerado no banco de dados
     * @param string $email é o email para que o token foi gerado
     * 
     * @return view
     */
    public function showResetPasswordForm($token, $email) {
        return view('login/atualiza-senha', compact('token', 'email'));
    }

    /**
     * Metodo que recebe os dados do formulario e atualiza as informações
     * 
     * @param Request $request 
     * 
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request) {
        
        $request->validate([
            'token'     => 'required',
            'email'     => 'required',
            'password'  => 'required|confirmed|min:8|max:20',
        ]);
        
        // dd('io');
        $status = Password::reset(
            $request->only('email', 'password', 'password_conformation', 'token'), 
            function(User $user, string $password) {
                $user->forceFill([
                    'password'  => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET 
        ? redirect()->route('login')->with('success', 'A senha foi atualizada!') 
        : back()->with('fail', 'Erro ao atualizar senha. Tente Novamente');
    }
}
