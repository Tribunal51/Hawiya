<h3>Create Store Product</h3> 

{!! Form::open(['action' => 'StoreController@createProduct', 'method' => 'POST', 'files' => true]) !!}

    <table class="table">
        <thead class="thead thead-dark">
            <tr> 
                <th scope="col">Attribute</th>
                <th scope="col">Value</th>
            </tr> 
        </thead> 
        <tbody> 
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" required /></td> 
            </tr> 
            <tr> 
                <td>Title (Arabic) </td> 
                <td><input type="text" name="title_ar" class="text-md-right" required /></td>
            </tr>
            <tr> 
                <td>Image</td> 
                <td> 
                    <div class="flex-column">
                        <input type="file" name="image" id="my_file" required />
                        <div class="gallery"></div>
                    </div> 
                </td> 
            </tr> 
            <tr>
                <td>Price</td> 
                <td><input type="number" step="0.01" name="price" required /></td>
            </tr>
        </tbody> 
    </table> 
    <a href="{{URL::previous()}}" class="btn btn-secondary ">Back</a>
    {!! Form::submit('Create Product', ['class' => 'btn btn-primary']) !!}
    
        
    

    
{!! Form::close() !!}