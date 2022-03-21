@extends('adminlte')
 @section('content')

    <!-- Main content -->
    <div class="content"  style="margin-top:-750px;">
    
      <section>
        
        <table class="content-table" style="margin-top:50px; margin-left:15px;">
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Sex</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Actions</th>
</thead>
            <tbody>
           <form action="{{ route('update', [$admin->id]) }}" method="POST">
           @csrf
            <tr>
                <td> <input style="width:125px;" type="text" name="firstName" id="firstName" value="{{ $admin->First_Name}}"> </td>
                <td> <input style="width:125px;" type="text" name="lastName" id="lastName" value="{{ $admin->Last_Name}}">
                <td> <input style="width:125px;" type="text" name="email" id="email" value="{{ $admin->Email}}">
                <td> <input style="width:125px;" type="text" name="phone" id="phone" value="{{ $admin->Phone}}">
                <td> <input style="width:125px;" type="text" name="sex" id="sex" value="{{ $admin->Sex}}">
                <td> <input style="width:125px;" type="text" name="username" id="username" value="{{ $admin->Username}}">
                <td> <input style="width:125px;" type="text" name="password" id="password" value="{{ $admin->Password}}">
                <td>
                     <select name="status" id="status">
                        <option value="{{ $admin->Status }}">Choose Status</option>
                        <option value="0">Activate</option>
                        <option value="1">Deactivate</option>
                     </select>
                </td>
                <td>
                    <button class="btn btn-primary" style="background-color:blue;color:white;padding:7px; width:80px;font-size:20px;" type="submit" name="submit">Update</button>
            </form>
                </td>
            </tr>
</tbody>
        </table>
        
        <form action="{{ route('destroy', [$admin->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" style="width:200px;margin:50px 500px ; font-size:30px;padding-top:0px;"><strong>Delete</strong></button> 
        </form>
       
       
      </section>
    </div>
   
    @endsection
    