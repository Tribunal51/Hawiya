<h3>Store Products</h3> 

{!! Form::open(['action' => 'StoreController@deleteProducts', 'method' => 'POST']) !!}

    <table class="table">
        <thead class="thead thead-dark">
            <tr> 
                <th scope="col">#</th>
                <th scope="col">Title</th> 
                <th scope="col">Title (Arabic)</th>
                <th scope="col">Image</th> 
                <th scope="col">Price</th> 
                <th scope="col"></th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($products as $product) 
                <tr> 
                    <td><a href={{"/dashboard/admin/data/store/product/".$product->id}}>{{ $product->id }}</a></td> 
                    <td>{{ $product->title }}</td> 
                    <td>{{ $product->title_ar }}</td> 
                    <td><img src="{{$product->image}}" alt="{{$product->image}}" class="small-img" /></td> 
                    <td>{{ $product->price }}</td> 
                    <td><input type="checkbox" name="products[]" value="{{$product->id}}" /></td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
    {!! Form::hidden('_method', 'DELETE') !!}
    <a href="/dashboard/admin/data/store/product/create" class="btn btn-primary">Create Product</a>
    {!! Form::submit('Delete selected products ', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}