<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Http\Request;
use App\User;
use App\Transformers\MemberTransformer;
use Auth;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getAllMember($kelas)
    {
        $dataMember = Member::with('user','classes')->where('class_id',$kelas)->get();

        $manager = new Manager();

        $collect = new Collection($dataMember, new MemberTransformer());
        $data = $manager->createData($collect)->toArray();

        return response()->json($data, 201);
    }
}
