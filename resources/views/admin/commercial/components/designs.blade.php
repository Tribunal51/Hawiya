{!! Form::open(['action' => 'CommercialItemsController@deleteDesigns', 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'DELETE') }} 
    {{ Form::submit('Delete Selected Designs', ['class' => 'btn btn-danger mb-2']) }}

    <h3>Designs</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">#</th>
                <th scope="col">Select</th> 
                <th scope="col">Design Name</th>
                <th scope="col">Shape</th> 
                <th scope="col">Orientation</th>
                <th scope="col">Front Base Photo</th> 
                <th scope="col">Front Text Photo </th> 
                <th scope="col">Back Base Photo</th> 
                <th scope="col">Back Text Photo</th> 
                <th scope="col">Price with Back Cover</th> 
                <th scope="col">Price without Back Cover</th> 
            </tr> 
        </thead> 
        <tbody>
            @foreach($designs as $design)
                <tr>
                    <th><a href={{"/dashboard/admin/data/commercial/design/".$design->id}}>{{ $design->id }}</th>
                    <td><input type="checkbox" name="designs[]" value="{{$design->id}}" /></td>  
                    <td>{{ $design->design_name }}</td>
                    <td>{{ $design->shape }}</td>
                    <td>{{ $design->orientation }}</td> 
                    <td><img class="small-img" src="{{$design->frontbasephoto}}" alt="{{$design->frontbasephoto}}" /></td>
                    <td><img class="small-img" src="{{$design->fronttextphoto}}" alt="{{$design->fronttextphoto}}" /></td>
                    <td><img class="small-img" src="{{$design->backbasephoto}}" alt="{{$design->backbasephoto}}" /></td> 
                    <td><img class="small-img" src="{{$design->backtextphoto}}" alt="{{$design->backtextphoto}}" /></td> 
                    <td>{{ $design->price_with_cover }}</td> 
                    <td>{{ $design->price_without_cover }}</td>
                </tr>
            @endforeach 
        </tbody> 
    </table>
{!! Form::close() !!}
