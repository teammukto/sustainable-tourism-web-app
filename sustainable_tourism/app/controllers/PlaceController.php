<?php

namespace App\Controllers;

use Larubel\Database\Bond;

use App\Model\Place;

use Larubel\Libs\Services\Session;

use Larubel\Core\Authentication\Auth;

use Larubel\Libs\Services\Request;

use Larubel\Libs\Services\Response;

use Larubel\Libs\Helpers\Helper;

class PlaceController extends Controller{

    public function show($id){

        $places = Bond::findWhere('App\\Model\\Place', [
            'id' => $id
        ], 1);

        if(isset($places[0])){
            $place = $places[0];
            $reviews = Bond::findWhere('App\\Model\\Review', [
                'place_id' => $place->getId()
            ]);
            
            echo $this->view->render('places/show', compact('place', 'reviews'));
            return;
        }
        
        echo $this->view->render('404');
    }

    public function postReview($id, Request $request){

        if(!Auth::check()){
            Response::redirect('user/login');
        }

        $description = $request->get('description');
        $this->validator->validate('required', ['description' => $description]);

        $user = Auth::user();

        $places = Bond::findWhere('App\\Model\\Place', [
            'id' => $id
        ], 1);

        if(isset($places[0])){
            $place = $places[0];
            Bond::create('App\\Model\\Review', [
                'description' => $description,
                'place_id' => $place->getId(),
                'user_id' => $user->id(),
                'created_at' => date("Y-m-d H:i:s")
            ], 1);
            
            Response::redirect('places/' . $id);
            return;
        }
        
        echo $this->view->render('404');

    }

    public function getCreate(){
        if(!Auth::check()){
            Response::redirect('user/login');
        }

        $user = Auth::user();

        if(!$user->isAdmin()){
            Response::redirect('places');
            return;
        }

        echo $this->view->render('places/create');
    }
    public function postCreate(Request $request){

        if(!Auth::check()){
            Response::redirect('user/login');
        }

        $user = Auth::user();

        if(!$user->isAdmin()){
            Response::redirect('places');
            return;
        }

        $title = $request->get('title');
        $description = $request->get('description');
        $this->validator->validate('required|max=255', ['title' => $title]);
        $this->validator->validate('required', ['description' => $description]);

        $filePath = '';
        if($request->file('image')){
            $file = $request->file('image');
            $this->validator->validateFile($file);
            $filePath = Helper::uploadFile($file); 
            $filePath = $filePath ? $filePath : '';
        }
        
        echo $description;
        echo $filePath;
        
        Bond::create('App\\Model\\Place', [
            'title' => $title,
            'description' => $description,
            'img_path' => $filePath
        ]);

        Response::redirect('places');
    }

    public function index(){
        $places = Bond::all('App\\Model\\Place');
        echo $this->view->render('places/index', compact('places'));
    }
}