<?php

namespace App\Http\Controllers;

use App\Models\Fisher;
use App\Models\Specie;
use App\models\Freight;
use App\Models\RoleUser;
use App\models\FishStates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        try {
            if (Auth::check()) {
                $function = new Fisher();
                $fishers = $function->fishers();
                $species = Specie::all();
                $fish_states = FishStates::all();
                $function = new Freight();
                $freights = $function->freights();
                $count_freights = count($freights);
                $count_colective_fisherman = Fisher::where('status', 1)->where('fisher_type_id', 1)->get()->count();
                $count_singular_fisherman = Fisher::where('status', 1)->where('fisher_type_id', 2)->get()->count();

                return view('painel.home', compact('fishers', 'species', 'fish_states', 'count_freights', 'count_singular_fisherman', 'count_colective_fisherman'));
            }
            return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
        } catch (\Throwable $error) {
            //throw $th;
            return $error->getMessage();
        }
    }

    public function loginForm()
    {
        return view('painel.login');
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            Auth::logoutOtherDevices($request->input('password'));
            /* Fez autenticação */
            $user = auth()->user();
            Auth::login($user);
            $funcao = new RoleUser();
            $roles_users = $funcao->rolesFromUser($user->id);
            //dd( $roles_users);
            /* Criação de variáveis de sessão */
            session()->put('perfies', $roles_users);

            return redirect()->route('home');
        }

        return redirect()->route('login.form')->withInput($request->all())->with('warning', 'Email ou Senha incorrecta');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
