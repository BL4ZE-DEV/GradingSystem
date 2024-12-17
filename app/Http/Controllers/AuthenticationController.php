<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $role =  Role::where('name', $request->role)->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roleId' => $role->roleId
        ]);

        $token = JWTAuth::fromUser($user);

        if($role->name == 'teacher'){
           $teacher = Teacher::create([
                'userId' => $user->userId
            ]);

            if($teacher){
                return response()->json([
                    'status' => TRUE,
                    'user' => [
                        $token,
                        $user
                    ]
                ]);
            }
           
           
            $Student = Student::create([
                'userId' => $user->userId
            ]);

            if($Student){
                return response()->json([
                    'status' => TRUE,
                    'user' => [
                        $token,
                        $user
                    ]
                ]);
            }
        }


    }

    public function login(Request $request){
        $request->validate([
            'email' =>  'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email' , $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'invalid credentials'
            ],401);
        }

        $token = JWTAuth::fromUser($user);

         $role = Role::where('roleId', $user->roleId)->first();

        if ($role && $role->name === 'teacher') {
            $teacher = Teacher::where('userId', $user->userId)->first();

            return response()->json([
                'status' => true,
                'token' => $token,
                'user' => $user,
                'teacher' => $teacher ? $teacher->load('subject') : null
            ]);
        }


        $student = Student::where('userId', $user->userId)->first();

        return response()->json([
            'status' => true,
            'token' => $token,
            'user' => $user,
            'student' => $student ? $student->load('subject') : null
        ]);
    
    }
}
