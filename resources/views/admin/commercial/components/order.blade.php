{!! Form::open(['action' => ['AdminController@editCommercialOrder', 'id' => $order->id], 'method' => 'POST' ]) !!}
    {!! Form::hidden('_method', 'PUT') !!}
    {{ $order }}
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
                    <td>{{ $key }}</td>
                    <td>
                        @switch($key)
                            @case('frontside_file')
                            @case('backside_file')
                                <a href={{$value}}><img src={{$value}} alt={{$value}} class="small-img" /></a>

                            @break 

                            @case('printing_admin_id')
                                <select class="form-control" name="printing_admin">
                                    <option value="{{null}}">None</option>
                                    @foreach($printing_admins as $admin)
                                        <option value={{$admin->id}} {{ $admin->id === $value ? 'selected' : ''}}>{{ $admin->name}}</option>
                                    @endforeach 
                                </select>
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
    {!! Form::submit('Edit', ['class' => 'btn btn-secondary']) !!}
{!! Form::close() !!}