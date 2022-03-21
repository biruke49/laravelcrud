<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Repository\IAdminRepository;
use App\Repository\AdminRepository;
use DB;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $admins;

    public function __construct(IAdminRepository $admins){

        $this->admins = $admins;

    }

    public function index()
    {
        try{
            $admins = $this->admins->getAllAdmins();
        }catch(\Exception $e){
            return view('errors.adminnotfound');
            //dd('General Exception'.$e->getMessage());
            //return redirect()->back()->with('Message'.$e->getMessage());
        }
        return view('index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            return $this->admins->addNewAdmins();
        }catch(\Exception $e){
            return view('errors.pagenotfound');
            //dd('General Exception'.$e->getMessage());
            //return redirect()->back()->with('Message'.$e->getMessage());
        }
        //return $this->admins->addNewAdmins();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'email' => 'required|email|unique:admins,Email',
            'username' => 'required|unique:admins,Username',
            'password' => ['required','confirmed','min:8'],
         ]);
         $admindata = $request->all();
         try{
            $this->admins->storeNewAdmins($admindata);
         }catch(\Exception $ex){
             return view('errors.uploadfailed');
         }
         return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try{
            $admin = $this->admins->showAdmin($id);
        }catch(\Exception $e){
            return view('errors.adminnotfound');
            //dd('General Exception'.$e->getMessage());
            //return redirect()->back()->with('Message'.$e->getMessage());
        }
        return view('showsingle')->with('admin',$admin);
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
    public function update($id, Request $request)
    {
        try{
            $admindata = $request->all();
            $this->admins->updateAdmin($id, $admindata);
        }catch(\Exception $ex){
             return view('errors.updatefailed');
         }
        //return dd($result);
        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->admins->deleteAdmin($id);
        }catch(\Exception $ex){
            return view('errors.adminnotfound');
        }
        return redirect(route('index'));
    }
    public function status($id)
    {
        try{
            $this->admins->changeStatus($id);
        }catch(\Exception $ex){
            return view('errors.adminnotfound');
        }
        return redirect(route('index'));
    }
    public function profileshow()
    {
        try{
            return view('profileshow');
        }catch(\Exception $ex){
            return view('errors.adminnotfound');
        }
        
    }
    public function forgotpassword($id)
    {
        try{
            $admin = Admins::findOrFail($id);
        }catch(\Exception $ex){
            return view('errors.adminnotfound');
        }
        return view('forgotpassword',['admin'=>$admin]);
    }
    public function mail(Request $request, $id)
    {
        $email = request('email');
        try{
            $admins = Admins::findOrFail($id);
        }catch(\Exception $ex){
            return view('errors.adminnotfound');
        }
        foreach($admins as $admin){
            if($admins->Email == $email){
                $name=$admins->First_Name;
                Mail::to($email)->send(new SendMailable($name));
                return redirect()->back()->with(['status' => 'Reset link sent to your email.']);
            }
            else{
                return redirect()->back()->with(['status' =>'Email was not found']);
            }
        }
        
        
    }
    public function resetpassword()
    {
        try{
            return view('resetpassword');
        }catch(\Exception $ex){
            return view('errors.pagenotfound');
        }
        
    }
    public function savenewpassword(Request $request)
    {
        try{
            $this->admins->saveNewPassword();
        }catch(\Exception $ex){
            return view('errors.adminnotfound');
        }    
        return redirect(route('index'));
    }
}
