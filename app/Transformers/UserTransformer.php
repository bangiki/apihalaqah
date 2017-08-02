<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;
use App\Transformers\HalaqahTransformer;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use Auth;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

class UserTransformer extends TransformerAbstract{

    protected $availableIncludes = ['halaqahs'];

    public function transform(User $user){

        return [
                'id'=> $user->id,
                'name'=> $user->name,
                'email'=> $user->email,
                'gender'=> $user->gender,
                'kelas'=> $user->kelas,
                'level'=> (int) $user->level,
                'registered'=>$user->created_at->diffForHumans()
        ];

    }

    public function includeHalaqahs(User $user){
        $dataHalaqah = $user->halaqahs()->get();

        $manager = new Manager();
        $manager->setSerializer(new ArraySerializer());
        $collect = $this->collection($dataHalaqah, new HalaqahTransformer());
        $data = $manager->createData($collect)->toArray();

        return $collect;
    }

}
