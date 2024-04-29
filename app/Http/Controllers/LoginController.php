<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $error = $request->get('error');
        switch($error){
            case 1:
                $error = "Usuário ou senha inválidos!";
                break;
            case 2:
                $error = "Acesso negado! Usuário precisa de autenticação para prosseguir.";
                break;
            default:
                $error = "";
                break;
        }

        return view('site.login', ['title' => 'Super Gestão - Login', 'error' => $error]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // regras de valicação
        $rules = [
            'email' =>'email',
            'password' => 'required'
        ];

        $feedback = [
            'email.email' => 'O campo e-mail é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!'
        ];
        $request->validate($rules, $feedback);

        $email = $request->get('email');
        $password = $request->get('password');

        // echo "Email: $email - Senha: $password";

        $user = new User();

        $user_logged = $user->where('email', $email)->where('password', $password)->get()->first();

        if ($user_logged) {
            session_start();
            $_SESSION['name'] = $user_logged->name;
            $_SESSION['email'] = $user_logged->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
