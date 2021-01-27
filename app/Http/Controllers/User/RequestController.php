<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User_Request;

class RequestController extends Controller
{
    public function view(){
        if(\Auth::check()){
            return view('user_request.create');
        }
        return back();
        
    }
    public function complete(){
        return view('user_request.complete');
    }
    public function index(){
        $user_requests=User_Request::orderBy('created_at')->get();
        return view('user_request.index',['user_requests'=>$user_requests]);
    }
    public function show($id){
        $user_request=User_Request::findOrFail($id);
        return view('user_request.show',['user_request'=>$user_request]);
    }
    public function store(Request $request){
        $user_request=new User_Request;
        $user_request->requests=$request->requests;
        $user_request->subject=$request->subject;
        $user_request->user_id=\Auth::id();
        $user_request->save();
        return redirect(route('user_request.complete'));
    }
    public function delete($id){
         $user_request=User_request::findOrFail($id);
         $user_request->delete();
         return redirect(route('admin.home'));
    }
}
