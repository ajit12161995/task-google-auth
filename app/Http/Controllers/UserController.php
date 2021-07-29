<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersRegistration;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['2fa']);
    }
    

    public function AcountMatch(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $results = DB::table('UsersRegistrations')
                    ->whereemail($request->email)
                    ->wherepassword($request->password)
                    ->first();
        if($results){
            session(['id' => $results->id,'gmail' => $results->email]);
            return redirect('Login');     
        }else{
            $request->session()->flash('msg', 'User Name and Password wrong !');
            return redirect('/');
        }
        
    }

    //QR Code 
    public function index()
    {
        if(session()->get('id')){
            $google2fa = app('pragmarx.google2fa');
            $secret = $google2fa->generateSecretKey();
            $qrimage = $google2fa->getQRCodeInline(
                config('app.name'),
                session()->get('email'),
                $secret
            );
            return view('otpauth',['secret'=>$secret,'qrimage'=>$qrimage]);
        }else{
            return redirect('/');
        }
    }

    //OTP varify
    public function create(Request $request)
    {

        $google2fa = app('pragmarx.google2fa');

        $res = $google2fa->verifyGoogle2FA($request->secret,$request->otp);
        if($res){
            return redirect('Welcome');
        }else{
            $request->session()->flash('msg', 'Invalid OTP entered !');
            return redirect('Login');
        }
       
    }

    
    //User Registration
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:UsersRegistrations,email',
            'password' => 'required|confirmed',
            'manglik' => 'required',
        ]);
       
        $User = new UsersRegistration;
        $User->fname = $request->fname;
        $User->lname = $request->lname;
        $User->email = $request->email;
        $User->dob = $request->dob;
        $User->password = $request->password;
        $User->gander = $request->gander;
        $User->a_income = $request->a_income;
        $User->manglik = $request->manglik;
        if(!empty($request->occupation)){
            $occupation = implode(",",$request->occupation);
        }else{
            $occupation = '';
        }   

        if(!empty($request->family)){
            $family = implode(",",$request->family);
        }else{
            $family = '';
        }
       
        $User->occupation = $occupation;
        $User->family_type = $family;
        $User->remember_token = '';

        $request->session()->flash('success', 'User Registration successful !');
        $User->save();
        return redirect('New-Registration');
    }

   
    public function Welcome()
    {
        if(session()->get('id')){
            return view('Welcome');
        }else{
            return redirect('/');
        }
    }

    public function Logout()
    {
        session()->flush();
        return redirect('/');
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
}
