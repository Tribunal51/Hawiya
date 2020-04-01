{!! Form::open(['action' => 'PersonalItemsController@addPersonalItem', 'method' => 'POST', 'files' => true]) !!}
    <h3> Add Personal Item </h3>
    @csrf 

    <div class="form-group row mt-2">
        <label class="col-md-2" for="name">Name</label> 
        <input type="text" required name="name" id="name" class="col-md-6" />
    </div>

    <div class="form-group row mt-2">
        <label class="col-md-2" for="name_ar">Name (Arabic)</label> 
        <input type="text" name="name_ar" id="name_ar" class="col-md-6 text-md-right" required />
    </div> 

    <div class="form-group row mt-2">
        <label class="col-md-2" for="my_file">Image</label> 
        <input type="file" required name="image" id="my_file" class="col-md-3" /> 
        <div class="gallery col-md-3"></div>
    </div> 

    {!! Form::submit('Create Item', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}