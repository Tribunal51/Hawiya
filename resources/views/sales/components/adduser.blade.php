{!! Form::open(['action' => 'SalesAdminController@createUser', 'method' => 'POST']) !!}
    @csrf 
    <div class="form-group mt-2 row">
        <label for="name" class="col-md-2">Name</label> 
        <input type="text" class="form-control col-md-6" name="name" id="name" required />
    </div> 

    <div class="form-group mt-2 row">
        <label for="email" class="col-md-2">Email</label> 
        <input type="email" class="form-control col-md-6" name="email" id="email" required />
    </div> 

    <div class="form-group mt-2 row">
        <label for="email" class="col-md-2">Password</label> 
        <input type="password" class="form-control col-md-6" name="password" id="password" required />
    </div> 

    <div class="form-group mt-2 row">
        <label for="lang" class="col-md-2">Language</label> 
        <select name="lang" class="form-control col-md-6">
            <option value="en" selected>English</option>
            <option value="ar">Arabic</option>
        </select>
    </div> 

    {!! Form::submit('Create Account', ['class' => 'btn btn-primary']) !!}
    
{!! Form::close() !!}