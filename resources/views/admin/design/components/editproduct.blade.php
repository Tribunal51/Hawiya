{{-- {{ $data }}

{!! Form::open(['action' => ['AdminController@editProduct', $data->id], 'method' => 'POST', 'files' => true]) !!}
    @csrf 
    <div class="form-group row mt-2"> 
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        <div class="col-md-6">
            <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}" required />
        </div>
    </div>

    <div class="form-group mt-2 row">
        <label for="title_ar" class="col-md-4 col-form-label text-md-right">Title (Arabic)</label> 
        <div class="col-md-6">
            <input type="text" id="title_ar" name="title_ar" class="form-control" value="{{$data->title_ar}}" style="text-align: right" required />
        </div> 
    </div> 
    
    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
        <div class="col-md-6">
            <input type="number" id="price" name="price" class="form-control" value="{{$data->price}}" required />
        </div> 

    </div>

    <div class="form-group">
        
        <input type="file" name="image" id="my_files" />
        <button class="btn btn-secondary" type="button" onclick="document.location.reload()">Remove Photos</button>
        
            @include('admin.components.temp')

        
        
        
    </div>
    <div class="gallery"></div>
    <br>

    <div class="form-group row mb-0">       
        <div class="col-md-8 offset-md-4">
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::submit('Edit Product', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>    

{!! Form::close() !!} --}}

{!! Form::open(['action' => ['AdminController@editProduct', 'id' => $data->id], 'method' => 'POST', 'files' => true]) !!}
    {!! Form::hidden('_method', 'PUT') !!}

    @csrf 

    <h3> Edit Product</h3>

    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">Attribute</th> 
                <th scope="col">Value</th> 
            </tr> 
        </thead> 
        <tbody>
            <tr>
                <td>Title</td>
                <td> 
                    <input type="text" name="title" value="{{$data->title}}" />
                </td> 
            </tr> 
            <tr>
                <td>Title (Arabic)</td>
                <td>
                    <input type="text" id="title_ar" name="title_ar" value="{{$data->title_ar }}" class="text-md-right"  required />
                </td> 
            </tr> 

            <tr>
                <td>Price</td> 
                <td>
                    <input type="number" step="0.01" class="col-md-2" value="{{$data->price}}" name="price" id="price" required /> 
                </td>
            </tr>

            <tr>
                <td>Image</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            <img src={{$data->image}} alt={{$data->image}} class="small-img" />
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeImage" id="my_file"  />
                            <label for="changeImage">Change Image</label>
                            <br>
                            <input type="file" id="image" name="image" />
                            
                            
                        </div>  
                        <div class="col gallery"></div>
                    </div> 
                </td>
            </tr>
        </tbody> 
    </table> 

    {!! Form::submit('Save', ['class' => 'btn btn-primary m-1']) !!}
    
{!! Form::close() !!}

<a href={{"/dashboard/admin/databoard/addData/".$data->category_id}} class="m-1 btn btn-secondary">Back</a>