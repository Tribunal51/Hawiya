{{-- {{ $masterorder }} --}}

{!! Form::open(['action' => ['SalesAdminController@updateMasterOrder', $masterorder->id], 'method' => 'POST']) !!}
<table class="table">
    <thead class="thead thead-dark">
        <tr> 
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead>    
    <tbody> 
        @foreach((array)json_decode($masterorder) as $key => $value)
            <tr>
                <td>{{ $key }}</td> 
                <td>
                    @switch($key)
                        @case('delivery_date')
                            <input type="datetime-local" value={{date('Y-m-d\TH:i', strtotime($value))}} name="delivery_date" />
                            {{-- {{ $value }} --}}
                        @break 

                        @case('orders')
                            @foreach($value as $order) 
                                <div class="row">
                                    <div class="col">
                                        <a href={{"/dashboard/sales/order/".$order}}>{{ $order }}</a>
                                    </div> 
                                </div>
                            @endforeach 
                        @break 

                        @default 
                            {{ $value }}
                        @break 
                    @endswitch 
                </td> 
            </tr> 
        @endforeach
    </tbody>
</table> 

{!! Form::submit('Update', ['class' => 'btn btn-secondary']) !!}

{!! Form::close() !!}