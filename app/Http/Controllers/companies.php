<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class companies extends Controller
{

    public function getCompany($id){

        $company = Company::get()->where('id', $id)->first();
    
        return response()->json([
            'company'=>$company,
        ]);
    }

    public function getCompanies(){

        $companies = Company::all();
    
        return response()->json([
            'companies'=>$companies,
        ]);
    }




    public function postCompany(Request $request)
    {



// API  http://127.0.0.1:8000/api/post/company
/* 
    {
           "id": null,
           "user_id": 1,
           "company_name": "Dev-Coding",
           "company_phone": "+50662962461",
           "company_email": "workemailnelson@gmail.com",
           "company_description": "Servicios de desarrollo",
           "company_industry": "Tecnologia",
           "company_terms_and_conditions": "sin detalle",
           "company_website_url": "website url",
           "company_facebook_url": "facebook url",
           "company_instagram_url": "instagram url",
           "latitud": "latitud",
           "longitud": "longitud"
       }
**/
        $validator = $request->validate([
            'user_id'=>'required',
            'company_name'=>'required',
            'company_phone'=>'required',
            'company_email'=>'required',
            'company_description'=>'required',
            'company_industry'=>'nullable',
            'company_terms_and_conditions'=>'nullable',
            'company_website_url'=>'nullable',
            'company_facebook_url'=>'nullable',
            'company_instagram_url'=>'required',
            'latitud'=>'required',
            'longitud'=>'nullable'
        ]);

        if($validator){
          $company = Company::create([
                    'user_id'=>$request->user_id,
                    'company_name'=>$request->company_name,
                    'company_phone'=>$request->company_phone,
                    'company_email'=>$request->company_email,
                    'company_description'=>$request->company_description,
                    'company_industry'=>$request->company_industry,
                    'company_terms_and_conditions'=>$request->company_terms_and_conditions,
                    'company_website_url'=>$request->company_website_url,
                    'company_facebook_url'=>$request->company_facebook_url,
                    'company_instagram_url'=>$request->company_instagram_url,
                    'latitud'=>$request->latitud,
                    'longitud'=>$request->longitud
            ]);
            return response()->json([
                'message'=>'La compañia se creo con éxito.',
                'company'=>$company
            ]);
        }else{
            return response()->json([
                'message'=>'Lo sentimos algo salio mal.',
                'company'=>$request
            ]);

        }
    }
    public function putCompany(Request $request)
    {
     
          $company = Company::where('id', $request->id)->update([
            'user_id'=>$request->user_id,
            'company_name'=>$request->company_name,
            'company_phone'=>$request->company_phone,
            'company_email'=>$request->company_email,
            'company_description'=>$request->company_description,
            'company_industry'=>$request->company_industry,
            'company_terms_and_conditions'=>$request->company_terms_and_conditions,
            'company_website_url'=>$request->company_website_url,
            'company_facebook_url'=>$request->company_facebook_url,
            'company_instagram_url'=>$request->company_instagram_url,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud
            ]);

            if($company){
                return response()->json([
                    'message'=>'La compañia se actualizo con éxito.',
                    'company'=>$company
                ]);
            
            }else{
                return response()->json([
                    'message'=>'Lo sentimos algo salio mal.',
                    'company'=>$request
                ]);
            
            }
           
    }

      
    public function deleteCompany($id)
    {
        $company = Company::where('id',$id)->delete();
        return response()->json([
            'message'=>'La compañia se borro con exito.',
            'company'=>$company
        ]);
    }

   
}

