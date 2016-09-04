<?php

namespace App\Model;

class Place{

    private $id;
    private $title;
    private $description;
    private $img_path;
    private $created_at;


    public function getId(){
        return $this->id;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDate(){
        $time = strtotime($this->created_at);
        $date = date("d M Y", $time);
        $time = date("H:i a", $time);
        return $date . ' at ' . $time;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getImage(){
        return $this->img_path;
    }

}