{!! Form::open(['action' => 'FlyersController@deleteFlyers', 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'DELETE') }} 
    {{ Form::submit('Delete Selected Flyers', ['class' => 'btn btn-danger mb-2']) }}

    <h3>Flyers</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">#</th>
                <th scope="col">Select</th> 
                <th scope="col">Shape</th> 
                <th scope="col">Front Base Photo</th> 
                <th scope="col">Front Text Photo </th> 
                <th scope="col">Back Base Photo</th> 
                <th scope="col">Back Text Photo</th> 
                <th scope="col">Price with Back Cover</th> 
                <th scope="col">Price without Back Cover</th> 
            </tr> 
        </thead> 
        <tbody>
            @foreach($flyers as $flyer)
                <tr>
                    <th><a href={{"/dashboard/admin/data/flyer/".$flyer->id}}>{{ $flyer->id }}</th>
                    <td><input type="checkbox" name="flyers[]" value="{{$flyer->id}}" /></td>  
                    <td>{{ $flyer->shape }}</td> 
                    <td><img class="small-img" src="{{$flyer->frontbasephoto}}" alt="{{$flyer->frontbasephoto}}" /></td>
                    <td><img class="small-img" src="{{$flyer->fronttextphoto}}" alt="{{$flyer->fronttextphoto}}" /></td>
                    <td><img class="small-img" src="{{$flyer->backbasephoto}}" alt="{{$flyer->backbasephoto}}" /></td> 
                    <td><img class="small-img" src="{{$flyer->backtextphoto}}" alt="{{$flyer->backtextphoto}}" /></td> 
                    <td>{{ $flyer->price_with_cover }}</td> 
                    <td>{{ $flyer->price_without_cover }}</td>
                </tr>
            @endforeach 
        </tbody> 
    </table>
{!! Form::close() !!}
