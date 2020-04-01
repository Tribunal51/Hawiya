{{-- {{ $items }} --}}
{!! Form::open(['action' => 'PersonalItemsController@deletePersonalItems', 'method' => 'POST']) !!} 
    {!! Form::hidden('_method', 'DELETE') !!}


    <h3> Personal Items </h3>

    {!! Form::submit('Delete selected items', ['class' => 'btn btn-danger m-3']) !!}

    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">#</th> 
                <th scope="col">Name</th> 
                <th scope="col">Name (Arabic)</th> 
                <th scope="col">Image</th> 
                <th scope="col">Subitems</th>
                <th scope="col"></th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($items as $item) 
                <tr>
                    <td><a href={{"/dashboard/admin/data/personal/item/".$item->id}}>{{ $item->id }}</a></td> 
                    <td>{{ $item->name }}</td> 
                    <td>{{ $item->name_ar}}</td>
                    <td><img class="small-img" src={{$item->image}} alt={{$item->image}} /></td> 
                    <td>{{ implode(", ", $item->subitem_names)}}</td>
                    <td><input type="checkbox" name="items[]" value={{$item->id}} /></td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table> 

{!! Form::close() !!}