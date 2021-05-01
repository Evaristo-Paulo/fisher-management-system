<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Models\Role;
use App\Models\Fisher;
use App\Models\Gender;
use App\Models\Specie;
use App\models\Freight;
use App\Models\Province;
use App\Models\RoleUser;
use App\Models\FisherType;
use App\models\FishStates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FisherUpdateRequest;
use App\Http\Requests\FisherRegisterRequest;
use App\Http\Requests\FisherChangePhotoRequest;
use App\Http\Requests\FreightAddCaptureRequest;

class FisherController extends Controller
{
    public function list()
    {
        if (Auth::check()) {
            $function = new Fisher();
            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();
            return view('painel.fishers.list', compact('fishers', 'species', 'fish_states'));
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }

    public function freightList()
    {
        if (Auth::check()) {
            $function = new Freight();
            $freights = $function->freights();
            $function = new Fisher();
            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();
            return view('painel.fishers.freightList', compact('fishers', 'freights', 'species', 'fish_states'));
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }
    public function addFreight(FreightAddCaptureRequest $request)
    {
        try {
            if (Auth::check()) {
                if (Gate::denies('just-admin-or-manager')) {
                    //return redirect()->back()->with('edit-auth', 'Não tem permissão para mudar fotografia');
                    return response()->json(['error' => $request->all()]);
                }

                $freight = [
                    'fisher_id' => $request->input('fisher'),
                    'weight' => $request->input('weight'),
                    'fishing_date' => $request->input('date'),
                    'resource_id' => $request->input('resource'),
                    'fish_state_id' => $request->input('state'),
                ];

                $result = Freight::create($freight);
                return response()->json(['success' => 'Pescado atribuido ao armador', 'result' => $result]);
            }
            return response()->json(['error' => $request->all()]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error-exception', 'Ocorreu algum erro, verifica os dados e tenta novamente');
        }
    }


    public function changePhoto(FisherChangePhotoRequest $request)
    {
        try {
            if (Auth::check()) {
                if (Gate::denies('just-admin-or-manager')) {
                    return redirect()->back()->with('edit-auth', 'Não tem permissão para mudar fotografia');
                }
                $aux = Fisher::where('bi', $request->input('bi'))
                    ->where('status', 1)
                    ->first();

                if ($aux != null) {
                    $old_fisher = Fisher::where('id', $aux->id)->first();
                    $nameFile = $old_fisher->photo;

                    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                        $name = uniqid(date('HisYmd'));
                        $extension = $request->photo->extension();
                        $nameFile = "{$name}.{$extension}";
                        $upload = $request->photo->storeAs('fishers', $nameFile);

                        if (!$upload) {
                            return redirect()->back()->with('create-auth', 'Houve um problema ao armazenar a fotografia');
                        }
                    }
                    $fisher = [
                        'name' => $old_fisher->name,
                        'birthday' => $old_fisher->birthday,
                        'bi' => $old_fisher->bi,
                        'nif' => $old_fisher->nif,
                        'email' => $old_fisher->email,
                        'phone' => $old_fisher->phone,
                        'municipe_id' => $old_fisher->municipe_id,
                        'fisher_type_id' => $old_fisher->fisher_type_id,
                        'photo' => $nameFile,
                        'gender_id' => $old_fisher->gender_id,
                    ];
                    \DB::table('fishers')
                        ->where('id', $old_fisher->id)
                        ->update($fisher);

                    return redirect()->back()->with('password-changed', 'Fotografia alterada com sucesso');
                }

                return redirect()->back()->with('user-not-found', 'Armador não encontrado');
            }
            return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-exception', 'Ocorreu algum erro, verifica os dados e tenta novamente');
        }
    }

    public function show($id)
    {
        try {

            if (Auth::check()) {
                if (Fisher::find($id)) {
                    $function = new Fisher();
                    $fishers = $function->getFisher($id);
                    $fisher = $fishers[0];
                    $genders = Gender::all();
                    $provinces = Province::all();
                    $fisherTypes = FisherType::all();

                    return view('painel.fishers.show', compact('provinces', 'genders', 'fisherTypes', 'fisher', 'fishers', 'species', 'fish_states'));
                }
                return redirect()->back()->with('update-auth', 'Foi feita uma requesição incorrecta');
            }
            return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }


    public function editForm($id)
    {
        if (Auth::check()) {
            $id = decrypt($id);
            $function = new Fisher();
            $fishers = $function->getFisher($id);
            $fisher = $fishers[0];

            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();

            if (Gate::denies('just-admin-or-manager')) {
                return redirect()->back()->with('edit-auth', 'Não tem permissão para actualizar dados');
            }
            $genders = Gender::all();
            $provinces = Province::all();
            $fisherTypes = FisherType::all();
            return view('painel.fishers.edit', compact('provinces', 'genders', 'fisherTypes', 'fisher', 'fishers', 'species', 'fish_states'));
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }

    public function edit(FisherUpdateRequest $request, $id)
    {
        try {

            $old_fisher = Fisher::find($id);
            $nameFile = $old_fisher->photo;

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $request->photo->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->photo->storeAs('fishers', $nameFile);
                if (!$upload) {
                    return redirect()->back()->with('create-auth', 'Houve um problema ao armazenar a fotografia');
                }
            }

            $fisher = [
                'name' => $request->input('name'),
                'birthday' => $request->input('birthday'),
                'bi' => $request->input('bi'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'municipe_id' => $request->input('municipe'),
                'fisher_type_id' => $request->input('fisherType'),
                'photo' => $nameFile,
                'gender_id' => $request->input('gender'),
            ];

            \DB::table('fishers')
                ->where('id', $old_fisher->id)
                ->update($fisher);

            return redirect()->route('fisher.list')->with('updated', 'Armador actualizado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
            //return redirect()->back()->withInput($request->all());
        }
    }


    public function registerForm()
    {
        if (Auth::check()) {
            if (Gate::denies('only-admin')) {
                return redirect()->back()->with('create-auth', 'Não tem permissão para registar dados');
            }
            $genders = Gender::all();
            $provinces = Province::all();
            $fisherTypes = FisherType::all();
            $function = new Fisher();
            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();
            return view('painel.fishers.register', compact('provinces', 'genders', 'fisherTypes', 'fishers', 'fish_states', 'species'));
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }

    public function register(FisherRegisterRequest $request)
    {
        try {
            $nameFile = 'default.png';

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $request->photo->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $request->photo->storeAs('fishers', $nameFile);
                if (!$upload) {
                    return redirect()->back()->with('create-auth', 'Houve um problema ao armazenar a fotografia');
                }
            }

            if($request->input('fisherType') == 2){
                $validator = Validator::make($request->all(), [
                    'gender' => 'required',
                ], [
                    'gender.required' => 'Campo gênero é de preenchimento obrigatório ',
                ]);
    
                if ($validator->fails()) {
                    return redirect()->back()->with('create-auth', 'Campo gênero é de prrenchimento obrigatório ');
                }
            }
            
            $fisher = new Fisher();
            $fisher->name = $request->input('name');
            $fisher->birthday = $request->input('birthday');
            $fisher->bi = $request->input('bi');
            $fisher->gender_id = $request->input('gender');
            $fisher->email = $request->input('email');
            $fisher->phone = $request->input('phone');
            $fisher->municipe_id = $request->input('municipe');
            $fisher->fisher_type_id = $request->input('fisherType');
            $fisher->photo = $nameFile;
            $fisher->save();



            return redirect()->route('fisher.register.form')->with('created', 'Armador registado com sucesso');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function remove(Request $request)
    {
        if (Auth::check()) {
            if (Gate::denies('only-admin')) {
                return redirect()->route('fisher.list')->with('delete-auth', 'Não tem permissão para remover dados');
            }

            $fisher = Fisher::find($request->input('element'));
            $fisher->status = 0;
            $fisher->save();
            return redirect()->route('fisher.list')->with('deleted', 'Armador removido com sucesso');
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }
}
