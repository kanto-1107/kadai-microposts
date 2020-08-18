<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id' , 'desc')->paginate(10);
        
        return view('users.index',[
            'users' => $users,
            ]);
    }
    public function show($id){
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show',[
            'user' => $user,
            'microposts' => $microposts,
            ]);
    }
    
    public function followings($id){
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $followings = $user->followings()->paginate(10);
        
        return view('users.followings',[
            'user'=> $user,
            'users' =>$followings,
            
            ]);
    }
    
    public function followers($id){
        
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $followers = $user->followers()->paginate(10);
        
        return view('users.followers', [
            'user' => $user,
            'users'=> $followers,
            ]);
    }
    
    public function favorites($id){
        $user = User::findOrFail($id);

        
        $user->loadRelationshipCounts();
        
        $microposts = $user->favorites()->paginate(10);
        
        return view('users.favorites',[
            'user' =>$user,
            'microposts' => $microposts,
            ]);
    }
    public function favorites_user(){
        $user = User::findOrFail($id);
        
        
        
        $user->loadRelationshipCounts();
        
        $favorites_user = $user->favorites()->paginate(10);
        
        return view('users.favorites_user',[
            'user' =>$user,
            'users' => $favorites_user,
            ]);
    }
}
