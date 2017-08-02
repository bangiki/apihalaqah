<?php
namespace App\Transformers;
use App\Member as mMember;
use League\Fractal\TransformerAbstract;


class MemberTransformer extends TransformerAbstract
{
    function transform(mMember $member){

        return [
            'id_user'           =>  (int) $member->user_id,
            'nama_member'       =>  $member->nama_member,
            'email_member'      =>  $member->email_member,
            'gender'            =>  $member->gender,
            'umur'              =>  $member->umur,
            'alamat'            =>  $member->alamat,
            'ttl'               =>  '',
            'sebagai'           =>  $member->sebagai,
            'kelas'             =>  $member->kelas,
            'tanggal_daftar'    =>  $member->created_at->format('d-F-Y'),            
        ];

    }

}
