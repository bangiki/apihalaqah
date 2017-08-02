<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Transformers\UserTransformer;
use Auth;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function register(Request $request, User $user){

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'gender'=>'required',
            'level'=>'required|min:1',
        ]);

        $userCreate = $user->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>app('hash')->make($request->password),
            'api_token'=>base64_encode(str_random(40)),
            'level'=>$request->level
        ]);

        $getUserId = $userCreate->id;

        Member::create(['user_id'=>$getUserId,'gender'=>$request->gender,'class_id'=>$request->kelas,'sebagai'=>'member']);

        $manager = new Manager();

        $item = new Item($userCreate, new UserTransformer());
        $data = $manager->createData($item)->toArray();

        return response()->json($data, 201);
    }

    public function login(Request $request, User $users){       

        $this->validate($request, [
              'email' => 'required|email',
              'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
           return response()->json(['error'=>'your credential is wrong'], 401);
        }

        if(Hash::check($request->input('password'), $user->password) && ($request->email === $user->email)){

          $apikey = base64_encode(str_random(40));
          User::where('email', $request->input('email'))->update(['api_token' => "$apikey"]);

          $userFind = $users->find($user->id);
          
          $manager = new Manager();
          
          $item = new Item($userFind, new UserTransformer());
          $data = $manager->createData($item->setMeta(['token'=>$apikey]))->toArray();
          
          return response()->json($data);

        }else {
            return response()->json(['error'=>'your credential is wrong'], 401);
        }

    }


}
