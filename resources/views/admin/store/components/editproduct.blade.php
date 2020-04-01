<h3>Edit Product </h3>

{!! Form::open(['action' => ['StoreController@editProduct', 'id' => $product->id], 'method' => 'POST', 'files' => true]) !!}
    <table class="table">
        <thead class="thead thead-dark">
            <tr>
                <th scope="col">Attribute</th> 
                <th scope="col">Value</th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach(json_decode($product) as $key => $value) 
                <tr>
                    @switch($key)

                        @case('title')
                            <td>{{ $key }}</td> 
                            <td>
                                <input type="text" value="{{$product->title}}" name="title" />
                            </td> 
                        @break 

                        @case('title_ar')
                            <td>{{ $key }}</td> 
                            <td> 
                                <input type="text" value="{{$product->title_ar}}" name="title_ar" class="text-md-right" />
                            </td> 
                        @break 

                        @case('price')
                            <td>{{ $key }}</td> 
                            <td>
                                <input type="number" step="0.01" value="{{$product->price}}" name="price" />
                            </td> 
                        @break 

                        @case('image')
                            <td>{{ $key }}</td> 
                            <td> 
                                <div class="row">
                                    <div class="col">
                                        
                                        <img src="{{$value}}" alt="{{$value}}" class="small-img" />
                                    </div>
                                </div> 
                                <hr> 
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" name="changeImage" id="changeImage" />
                                        <label for="changeImage">Change Image</label>
                                    </div> 
                                    
                                </div> 
                                <div class="row">
                                    <div class="col">
                                        <input type="file" id="my_file" name="image" />
                                        <div class="gallery"></div>
                                    </div>
                                </div> 
                            </td> 
                        @break 
                    @endswitch
                </tr> 
            @endforeach 
        </tbody>
    </table> 

    {!! Form::hidden('_method', 'PUT') !!}

    <a class="btn btn-secondary" href="{{URL::previous()}}">Back</a> 
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {{-- <a class="btn btn-primary" href={{"/dashboard/admin/data/store/product/".$product->id."/edit"}}>Save</a> --}}

    

{!! Form::close() !!}