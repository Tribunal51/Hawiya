{!! Form::open(['action' => ['CommercialOrdersController@editOrder', 'id' => $order->id], 'method' => 'POST' ]) !!}
    {!! Form::hidden('_method', 'PUT') !!}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr> 
        </thead> 
        <tbody>
            @foreach((array)json_decode($order) as $key => $value)
                <tr>
                    @switch($key) 
                        @case('frontside_file')
                        @case('backside_file')
                            <td>{{ $key }}</td> 
                            <td><a href={{$value}}><img src={{$value}} alt={{$value}} class="small-img" /></a></td> 
                        @break 

                        @case('printing_admin_name')
                            <td>Printing Admin</td> 
                            <td>
                                <select class="form-control" name="printing_admin">
                                    <option value="{{null}}">None</option>
                                    @foreach($printing_admins as $admin)
                                        <option value={{$admin->id}} {{ $admin->id === $value ? 'selected' : ''}}>{{ $admin->name}}</option>
                                    @endforeach 
                                </select>
                            </td> 
                        @break

                        @default 
                            <td>{{ $key }}</td> 
                            <td>{{ $value }}</td>
                        @break 
                    @endswitch 
                </tr>
            @endforeach 
        </tbody>
    </table> 
    <a class="btn btn-secondary" href="/dashboard/admin/orderboard/commercial">Back</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}