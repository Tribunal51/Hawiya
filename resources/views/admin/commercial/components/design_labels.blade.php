{!! Form::open(['action' => ['CommercialItemsController@deleteLabels'], 'method' => 'POST']) !!}
    <h3>Labels list</h3> 
 
    <table class="table">
        <thead class="thead-dark">
            <tr>
                @foreach($label_columns as $column)
                    @switch($column)
                        
                        @case('commercial_item_id')
                        @case('updated_at')
                        @case('is_image')
                        @case('created_at')
                        @break 

                        @default 
                            <th scope="col">{{ $column }}</th>
                        @break 
                    @endswitch 
                @endforeach 
                <th scope="col"></th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach($design->labels as $label)
                <tr>
                    @foreach($label_columns as $column) 
                        @switch($column)
                            @case('id')
                                <td><a href={{"/dashboard/admin/data/commercial/label/".$label[$column]}}>{{ $label[$column] }}</a></td>
                            @break 

                            @case('commercial_item_id')
                            @case('updated_at')
                            @case('is_image')
                            @case('created_at')
                            
                            @break 

                            @case('backside')
                                <td>{{ $label->backside ? "True" : "False" }}</td>
                            @break 

                            @case('image') 
                                <td><img class="small-img" src="{{$label[$column]}}" alt="{{$label[$column]}}" /></td>
                            @break 

                            
                            
                            @default 
                                <td>{{ $label[$column] }}</td>
                            @break 
                        @endswitch 
                        {{-- <td>{{ $label[$column] }}</td> --}}
                    @endforeach 
                    <td><input type="checkbox" name="labels[]" value={{$label->id}} /></td> 
                </tr> 
            @endforeach 
        </tbody> 
    </table> 
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete selected Labels', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
