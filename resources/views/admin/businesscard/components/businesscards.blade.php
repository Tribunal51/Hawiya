{!! Form::open(['action' => 'AdminController@deleteBusinesscards', 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'DELETE') }} 
    {{ Form::submit('Delete Selected Cards', ['class' => 'btn btn-danger mb-2']) }}
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
            @foreach($cards as $card)
                <tr>
                    <th><a href={{"/dashboard/admin/data/businesscard/".$card->id}}>{{ $card->id }}</th>
                    <td><input type="checkbox" name="cards[]" value="{{$card->id}}" /></td>  
                    <td>{{ $card->shape }}</td> 
                    <td><img class="small-img" src="{{$card->frontbasephoto}}" alt="{{$card->frontbasephoto}}" /></td>
                    <td><img class="small-img" src="{{$card->fronttextphoto}}" alt="{{$card->fronttextphoto}}" /></td>
                    <td><img class="small-img" src="{{$card->backbasephoto}}" alt="{{$card->backbasephoto}}" /></td> 
                    <td><img class="small-img" src="{{$card->backtextphoto}}" alt="{{$card->backtextphoto}}" /></td> 
                    <td>{{ $card->price->with_cover }}</td> 
                    <td>{{ $card->price->without_cover }}</td>
                </tr>
            @endforeach 
        </tbody> 
    </table>
{!! Form::close() !!}
