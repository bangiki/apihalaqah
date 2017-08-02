<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $timetamps = true;
    protected $fillable = [
      'user_id',
      'gender',
      'umur',
      'alamat',
      'photo',
      'sebagai',
      'class_id'
    ];
    protected $hidden = ['user'];
    protected $appends = ['nama_member','email_member','kelas'];


    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function classes(){
        return $this->belongsTo('App\Classes','class_id','class_id');
    }

    public function getNamaMemberAttribute(){
        return collect($this->user)->get('name','-');  
    }

    public function getEmailMemberAttribute(){
        return collect($this->user)->get('email','-');  
    }

    public function getKelasAttribute(){
        return collect($this->classes)->get('class_name','-');  
    }


}
