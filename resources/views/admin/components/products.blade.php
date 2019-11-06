@if(count($data) > 0) 

    {!! Form::open(['action' => ['AdminController@deleteProduct'], 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete Selected Products', ['class' => 'btn btn-danger mb-2']) }}

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Select</th> 
                <th scope="col">Title</th> 
                <th scope="col">Title (Arabic)</th>
                <th scope="col">Image</th> 
                <th scope="col">Price</th> 
                <th scope="col"></th> 
                
            </tr>
        </thead>
        <tbody>
            @foreach($data['products'] as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th> 
                    <td><input name="products[]" value={{$item->id}} type="checkbox" /></td> 
                    <td>{{ $item->title }}</td> 
                    <td>{{ $item->title_ar}}</td>
                    <td><img style="width: 200px; height: 200px; border: 1px solid gray;" class="img-fluid" src="{{ $item->image }}" alt="{{$item->image}}" /></td> 
                    <td>{{ $item->price }}</td> 
                    <td>{{ link_to_action('PagesController@editProduct', 'Edit', ['id' => $item->id], ['class' => 'btn btn-secondary'])}} </td> 
                </th>
            @endforeach 
        </tbody>
    </table>

@endif 