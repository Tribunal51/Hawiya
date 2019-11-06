{{ $category->name }} Orders

{{ $orders }}

{!! Form::open(['action' => ['AdminController@deleteProduct'], 'method' => 'POST']) !!}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete Selected Products', ['class' => 'btn btn-danger mb-2']) }}

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Select</th> 
            <th scope="col">User</th> 
            <th scope="col">Package</th> 
            <th scope="col">Logo Photo</th> 
            <th scope="col">Comment </th> 
            <th scope="col">Created At</th> 
            <th scope="col">Days Left</th> 
            <th scope="col">Price </th> 
            <th scope="col">Designer</th> 
            <th scope="col"></th> 
            
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td><a href={{"/dashboard/admin/order?id=".$order->id."&category_id=".$order->category_id }}>{{ $order->id }}</a></td>
                <td><input type="checkbox" name="orders[]" /></td> 
                <td><a href={{ '/dashboard/admin/user/'.$order->user_id}}>{{ $order->user_id }}</a></td> 
                <td>{{ $order->package }}</td> 
                <td><img src="{{$order->logo_photo}}" alt="{{$order->logo_photo}}"  style="width: 100px; height: 100px" /></td> 
                <td>{{ $order->comment }}</td> 
                <td>{{ $order->created_at }}</td> 
                <td>{{ $order->days_left }}</td> 
                <td>{{ $order->price }}</td> 
                <td>{{ $order->designer }}</td> 
                <td><button>Edit</button></td> 
            </th>
        @endforeach 
    </tbody>
</table>