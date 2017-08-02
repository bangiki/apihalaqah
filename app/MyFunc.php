<?php
namespace App;

class MyFunc{

    public static function setUTC($timestamp){        
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Asia/Jakarta');
        $date->setTimezone('UTC');
        $date->setLocale('id');
        return $date->diffForHumans();
    }

    public static function waktuSekarang(){        
        $dateNow = \Carbon\Carbon::now('Asia/Jakarta');        
        return $dateNow;
    }

    //ga jadi dipake, setiap post data berbarengan, uuid berbeda setiap rownya        
    public static function uuidCustom1(){        
        //problem in server
        $uuidFactory = new \Ramsey\Uuid\UuidFactory(new \App\MyFeatureSet());
        \Ramsey\Uuid\Uuid::setFactory($uuidFactory);
        $uuid1 = \Ramsey\Uuid\Uuid::uuid1();

        return $uuid1;
    }
    

}