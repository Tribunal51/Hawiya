<h3> Sub-Items </h3> 

{!! Form::open(['action' => 'PersonalItemsController@deletePersonalSubitems', 'method' => 'POST']) !!}
{!! Form::hidden('_method', 'DELETE') !!}
{!! Form::submit('Delete selected subitems', ['class' => 'btn btn-danger m-3']) !!}
<table class="table">
    <thead class="thead-dark">
        <tr> 
            <th scope="col">#</th> 
            <th scope="col">Name</th> 
            <th scope="col">Name (Arabic) </th>
            <th scope="col">Image</th> 
            <th scope="col"></th> 
        </tr> 
    </thead> 
    <tbody>
        @foreach($subitems as $subitem)
            <tr>
                <td><a href={{"/dashboard/admin/data/personal/subitem/".$subitem->id}}>{{ $subitem->id }}</a></td> 
                <td>{{ $subitem->name }}</td> 
                <td>{{ $subitem->name_ar}}</td>
                <td><img src={{$subitem->image}} alt={{$subitem->image}} class="small-img" /></td> 
                <td><input type="checkbox" name="subitems[]" value={{$subitem->id}} /></td>
            </tr> 
        @endforeach 
    </tbody>
</table> 

{!! Form::close() !!}