<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\UserMeta;
use Illuminate\Http\Request;
use Validator;
class UserController extends Controller
{
   public function login(Request $request){
       $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $this->return = array('message'=>$validator->errors()->first());
            $status = 200;
        } else{
          if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            //print_r(Auth::user()); die;
            if (Auth::user()->status == 1) {
              //echo 'sdsssss'; die;
              $user=Auth::User();
              $this->return = array('status'=>200, 'message'=>trans('api.LOGIN_SUCCESS'), 'jsonData'=>$user);
              //$this->return['jsonData']['token'] = 'Bearer ' . $user->createToken('laravel ')->accessToken;
              $status = 200;
            }else{
              $this->return = array('status'=>200, 'message'=>trans('api.ACCOUNT_DEACTIVATE'));
              $status = 200;
            }
          } else {
               $this->return = array('status'=>200, 'message'=>trans('api.INVALID_CREDENTIALS'));
               $status = 200;
          }
        }
         return response()->json($this->return, $status);
    }
    
    public function userDetais(Request $request){
        if(Auth::check()){
            $user=Auth::User();
            $this->return['message'] = 'User details';
            $this->return['jsonData'] = $user;
            $status = 200;
        } else{
            $this->return['message'] = 'User Not Found';
            $this->return['status'] = 0;
            $status = 200;
        }
          return response()->json($this->return, $status);
    }
}
