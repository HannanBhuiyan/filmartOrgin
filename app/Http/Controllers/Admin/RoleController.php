<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class RoleController extends Controller
{
     public function allUserIndex(){
         $users = User::where("role_id", '!=', 1)->orderBy('id', 'DESC')->get();
         return view('admin.user.index',compact('users'));

     }
}
