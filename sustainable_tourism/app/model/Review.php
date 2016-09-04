<?php

namespace App\Model;

use Larubel\Database\Bond;

class Review{

    private $id;
    private $place_id;
    private $user_id;
    private $description;
    private $created_at;


    public function getId(){
        return $this->id;
    }

    public function getPlaceId(){
        return $this->place_id;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getUser(){

        $users = Bond::findWhere('App\\Model\\User', [
            'id' => $this->user_id
        ], 1);

        if(isset($users[0]))
            return $users[0];
        return null;
    }

    public function getDate(){
        $time = strtotime($this->created_at);
        $date = date("d M Y", $time);
        $time = date("H:i a", $time);
        return $date . ' at ' . $time;
    }

}