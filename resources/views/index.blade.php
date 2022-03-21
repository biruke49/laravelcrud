@extends('adminlte')
@section('content')
<div class="content" style="margin-left:50px;">
<section>
<table class="content-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Creator</th>
      <!-- <th>Username</th>
      <th>Password</th> -->
      <th>Update</th>
      <th>Delete</th>
      <th>Reset</th> 
      <th>Status</th>
      <th>Change</th>
    </tr>
  </thead>
  <tbody>
  @foreach($admins as $admin)
    <tr>

    <td>{{ $admin->id}}</td>
      <td>{{ $admin->First_Name}} {{ $admin->Last_Name}}</td>
      <td>{{ $admin->Phone}}</td>
      <td>{{ $admin->Email}}</td>
      <td>{{ Auth::user()->email }}</td>
      <!-- <td>{{ $admin->Username}}</td>
      <td>{{ $admin->Password}}</td> -->
      
      <td><a style="height:40px;" href="{{ route('show', [$admin->id]) }}" class="btn btn-primary" style="font-size:17px;">Update</a></td>
      <td>
        <form action="{{ route('destroy', [$admin->id]) }}" method="POST">
          @csrf
          @method('DELETE')
            <button style="height:40px;" class="btn btn-danger" style=" font-size:17px;">Delete</button> 
        </form>
      </td>
      <td>
        <a style="height:40px;" href="{{ route('forgotpassword', [$admin->id]) }}" class="btn btn-primary" style="font-size:17px;">Reset</a>
      </td>
      <td>
        @if($admin->Status == '0')
           <label class="py-2 px-3 badge btn-primary">Active</label>
        @elseif($admin->Status == '1')
          <label class="py-2 px-3 badge btn-danger">Inactive</label>
        @endif
       
      </td>
      
      <td>
      <form action="{{ route('status', [$admin->id]) }}" method="POST">
            @csrf
            <select style="height:40px; font-size:15px;" name="status" id="status">
                        <option  value="{{ $admin->Status }}">Change status
                            <!-- @if($admin->Status == '0')
                            Active
                            @elseif($admin->Status == '1')
                            Inactive
                            @endif -->
                        </option>
                        <option value="0">Activate</option>
                        <option value="1">Deactivate</option>
                     </select>
                     <button style="background-color:blue;height:40px;" class="btn btn-primary" type="submit" name="submit">Change</button>
        </form>
      </td>
    </tr>
      @endforeach
</section>
</div>
@endsection