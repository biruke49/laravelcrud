<?php

namespace App\Repository;
use App\Models\Admins;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class AdminRepository implements IAdminRepository{
    
    public function getAllAdmins(){
            //return Admins::all();
            $creator_id = Auth::user()->id;
            return DB::table('admins')
            ->where('Created_by', $creator_id)
            ->get();
    }
    public function addNewAdmins()
    {
             return view('create');
    }
     public function storeNewAdmins(array $admindata)
     {
         
            $admins = new Admins();
            Admins::insert([
                'First_Name' => $admindata['firstName'],
                'Last_Name' => $admindata['lastName'],
                'Phone' => $admindata['phone'],
                'Email' => $admindata['email'],
                'Sex' => $admindata['sex'],
                'Username' => $admindata['username'],
                'Password' => $admindata['password'],
                'Created_by' => Auth::user()->id,
         ]);
     }
     public function showAdmin($id)
     {
            return Admins::findOrFail($id);

     }
     public function updateAdmin($id, array $admindata)
     {
        $admins = Admins::findOrFail($id);
            $admins->First_Name = $admindata['firstName'];
            $admins->Last_Name = $admindata['lastName'];
            $admins->Phone = $admindata['phone'];
            $admins->Email = $admindata['email'];
            $admins->Sex = $admindata['sex'];
            $admins->Username = $admindata['username'];
            $admins->Password = $admindata['password'];
            $admins->Status = $admindata['status'];
                $admins->update();
     }
    public function deleteAdmin($id)
    {
            $admin = Admins::findOrFail($id);
            $admin->delete();
    }

    public function changeStatus($id)
    {
        $admins = Admins::findOrFail($id);
        $admins->Status = request('status');
        $admins->update();
    }
    public function saveNewPassword()
    {
        $email = request('email');
        $admins = Admins::where('Email', $email)->firstOrFail();
        $admins->Password = request('password');
        $admins->update();
    }

}
?>