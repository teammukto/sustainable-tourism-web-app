<?php

namespace App\Controllers;

use Larubel\Database\Bond;

use App\Model\User;

use Larubel\Libs\Services\Session;

use Larubel\Core\Authentication\Auth;

use Larubel\Libs\Services\Request;

use Larubel\Libs\Services\Response;

class UserController extends Controller{

    public function getLogin(){
        if(Session::get('user'))
            Response::redirect('profile');
        echo $this->view->render('login');
    }

    public function postLogin(Request $request){
        if(Session::get('user'))
            Response::redirect('user/profile');

        $password = $request->get('password');
        $email =  $request->get('email');

        $this->validator->validate('required|email', ['email' => $email]);
        $this->validator->validate('required', ['password' => $password]);


        $user = Auth::attempt($email, $password);

        if($user){
            Response::redirect('user/profile');
        }else{
            Session::set('message', 'Login failed');
            echo $this->view->render('login');
        }
        
    }

    public function getSignup(){
        if(Session::get('user'))
            Response::redirect('user/profile');

        echo $this->view->render('registration');
    }

    public function show(){

        if(!Session::get('user'))
            Response::redirect('user/login');

        $user = Session::get('user');
        echo $this->view->render('person', compact('user'));

    }

    public function create(Request $request){
        if(Session::get('user'))
            Response::redirect('user/profile');

        $name = $request->get('name');
        $password = $request->get('password');
        $email =  $request->get('email');

        $this->validator->validate('required|alphaWithSpace', ['name' => $name]);
        $this->validator->validate('required|email', ['email' => $email]);
        $this->validator->validate('required', ['password' => $password]);

        Bond::insert('\\App\\Model\\User', [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        $user = Auth::attempt($email, $password);

        if($user){
            Response::redirect('user/profile');
        }else{
            Session::set('message', 'Login failed');
            Response::redirect('user/login');
        }

    }

    public function getLogout(){
        Session::delete('user');
        Response::redirect('user/login');
    }

    public function update(){

    }

    public function destroy(){

    }

}