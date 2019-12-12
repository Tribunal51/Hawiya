User: {{ $user }}
{!! Form::open(['action' => ['AdminController@editUser', 'id' => $user->id], 'method' => 'POST']) !!}
{{ Form::hidden('_method', 'PUT') }}
<h2>User Details</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
    @foreach((array)json_decode($user) as $key => $value)
        <tr>
            <td> {{ $key }} </td> 
            <td> 
                @switch($key) 
                    @case('designer')
                        <select class="form-control" id="exampleFormControlSelect1" name="designer">
                            @foreach([0 => 'False', 1 => 'True'] as $key => $value)
                                <option value="{{ $key }}" {{ $user->designer === $key ? 'selected': '' }}>{{ $value }}</option>
                            @endforeach 
                        </select>   
                        
                    @break

                    @case('admin')
                    <select class="form-control" id="exampleFormControlSelect1" name="admin">
                        @foreach([0 => 'False', 1 => 'True'] as $key=>$value)
                            <option value="{{ $key }}" {{ $user->admin === $key ? 'selected': '' }}>{{ $value }}</option>
                        @endforeach 
                    </select> 
                    @break 

                    @default {{$value}}
                @endswitch 
            </td>
        </tr>      
    @endforeach 
    </tbody>
</table>

<button>Update User</button>
<hr>

<h2>User Orders (Design)</h2> 
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Category</th>
            <th scope="col">Days Left</th> 
            <th scope="col">Designer</th> 
        </tr>
    </thead>
    <tbody>
    @foreach($design_orders as $order)
        <tr>
            <td><a href={{"/dashboard/admin/order?id=".$order->id."&category_id=".$order->category_id}}>{{ $order->order_id }}</a></td> 
            <td>{{ $order->type }}</td> 
            <td>{{ $order->days_left }}</td>
            <td><a href={{"/dashboard/admin/user/".$order->designer_id}}>{{ $order->designer_name }}</a></td>
        </tr>      
    @endforeach 
    </tbody>
</table>

{!! Form::submit('Edit', ['class' => 'btn btn-secondary']) !!}
{!! Form::close() !!}
