@extends('adminlte')
 @section('content')
 <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content" >
      <section>
      <form data-multi-step class="multi-step-form" method="POST" action="{{ route('store') }}">
        @csrf
    <div class="card" data-step>
      <h3 class="step-title">Registration Form</h3>
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" required>
      </div>
      <div class="form-group">
      <label for="sex">Gender: </label>
		<select name="sex" id="sex" required>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
      </div>
      <button type="button" data-next>Next</button>
    </div>
    <!-- <div class="card" data-step>
      <h3 class="step-title">This is step 2</h3>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city" id="city">
      </div>
      <div class="form-group">
        <label for="subcity">Sub City</label>
        <input type="text" name="subcity" id="subcity">
      </div>
      <button type="button" data-previous>Previous</button>
      <button type="button" data-next>Next</button>
    </div> -->
    <div class="card" data-step>
      <h3 class="step-title">Registration Form</h3>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
      </div>
      
      
      
      <button type="button" data-previous>Previous</button>
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
      </section>
    </div>
  
    @endsection
    