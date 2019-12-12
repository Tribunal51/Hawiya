{!! Form::open(['action' => 'AdminController@deleteCommercialItems', 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'DELETE') }} 
    {{ Form::submit('Delete Selected Items', ['class' => 'btn btn-danger mb-2']) }}
    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">#</th>
                <th scope="col">Select</th> 
                <th scope="col">Name</th> 
                <th scope="col">Image</th> 
                <th scope="col">Price </th> 
            </tr> 
        </thead> 
        <tbody>
            @foreach($items as $item)
                <tr>
                    {{-- <th><a href={{"/dashboard/admin/data/commercial/item/".$item->id}}>{{ $item->id }}</th> --}}
                    <th>{{ $item->id}}</th>
                    <td><input type="checkbox" name="items[]" value="{{$item->id}}" /></td>  
                    <td>{{ $item->name }}</td> 
                    <td><img class="small-img" src="{{$item->image}}" alt="{{$item->frontbasephoto}}" /></td>
                    <td>{{ $item->price }}</td>
                </tr>
            @endforeach 
        </tbody> 
    </table>
{!! Form::close() !!}
