<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $validator = $request->validate([
            'country_code'=>'required',
            'area_code'=>'required',
            'name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'photo'=>'',
            'avatar'=>'',
            'status'=>'',
            'google_sign_in'=>'',
            'email'=>'required | unique',
            'login_attempts'=> 0,
            'password'=>'required',
            'last_login'=>'',
            'status_notes'=>''
        ]);
        if($validator){
      $user =  User::create([
        'country_code'=>$request->country_code,
        'area_code'=>$request->area_code,
                'name'=>$request->name,
                'last_name'=>$request->last_name,
                'phone'=>$request->phone,
                'photo'=>$request->photo,
                'avatar'=>$request->avatar,
                'status'=>$request->status,
                'google_sign_in'=>$request->google_sign_in,
                'email'=>$request->email,
                'login_attempts'=>$request->login_attempts,
                'password'=>$request->password,
                'last_login'=>$request->last_login,
                'status_notes'=>$request->status_notes,
            ]);
            return response()->json([
                'message'=>'El usuario se creo con éxito.',
                'user'=>$user
            ]);
        }else{
            return response()->json([
                'message'=>'Lo sentimos algo salio mal.',
                'user'=>$request
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function getUsers(){

        $users = User::all();
        

        return response()->json([
            'users'=>$users,
        ]);
    }

    public function login($email){

        $user = User::get()->where('email', $email)->first();
    
        return response()->json([
            'user'=>$user,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteUser($email)
    {
        $user = User::where('email',$email)->delete();
        return response()->json([
            'message'=>'El usuario se borro con exito.',
            'user'=>$user
        ]);
    }

    public function postUser(Request $request)
    {


// API  http://127.0.0.1:8000/api/post/user
/* 
    {
            "id": null,
           "country_code": "CR",
           "area_code": "+506",
           "name": "Nelson",
           "last_name": "Morera Fernandez",
           "phone": "62962461",
           "photo": "none",
           "avatar": false,
           "status": true,
           "google_sign_in": false,
           "email": "workemailnelson@gmail.com",
           "login_attempts": null,
           "password": "W3lcomeAb0ard!2022!",
           "last_login": "2022-10-09",
           "status_notes": "null",
           "created_at": "2022-10-09",
           "updated_at": "2022-10-09"
       }
**/
        $validator = $request->validate([
            'country_code'=>'required',
            'area_code'=>'required',
            'name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'photo'=>'nullable',
            'avatar'=>'nullable',
            'status'=>'nullable',
            'google_sign_in'=>'nullable',
            'email'=>'required',
            'login_attempts'=> 'nullable',
            'password'=>'required',
            'last_login'=>'nullable',
            'status_notes'=>'nullable'
        ]);

        if($validator){
          $user = User::create([
                    'country_code'=>$request->country_code,
                    'area_code'=>$request->area_code,
                    'name'=>$request->name,
                    'last_name'=>$request->last_name,
                    'phone'=>$request->phone,
                    'photo'=>$request->photo,
                    'avatar'=>$request->avatar,
                    'status'=>$request->status,
                    'google_sign_in'=>$request->google_sign_in,
                    'email'=>$request->email,
                    'login_attempts'=>$request->login_attempts,
                    'password'=>$request->password,
                    'last_login'=>$request->last_login,
                    'status_notes'=>$request->status_notes,
            ]);
            return response()->json([
                'message'=>'El usuario se creo con éxito.',
                'user'=>$user
            ]);
        }else{
            return response()->json([
                'message'=>'Lo sentimos algo salio mal.',
                'user'=>$request
            ]);

        }
    }
    public function putUser(Request $request)
    {
     
          $user = User::where('id', $request->id)->update([
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'photo'=>$request->photo,
            'avatar'=>$request->avatar,
            'google_sign_in'=>$request->google_sign_in,
            ]);

            if($user){
                return response()->json([
                    'message'=>'El perfil se actualizo con éxito.',
                    'user'=>$user
                ]);
            
            }else{
                return response()->json([
                    'message'=>'Lo sentimos algo salio mal.',
                    'user'=>$user
                ]);
            
            }
           
    }
    public function putResetPassword(Request $request)
    {
     

  
          $user = User::where('id', $request->id)->update([
            'password'=>$request->password,
            ]);

            if($user){
                return response()->json([
                    'message'=>'La contraseña se actualizo con éxito.',
                    'user'=>$user
                ]);
            
            }else{
                return response()->json([
                    'message'=>'Lo sentimos algo salio mal.',
                    'user'=>$user
                ]);
            
            }
           
    }
  
}
