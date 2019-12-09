Logodesign orders

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
            {{-- <th scope="col">Logotype</th> 
            <th scope="col">Style</th> 
            <th scope="col">Color</th> 
            <th scope="col">Brand Name</th> 
            <th scope="col">Business Field</th> 
            <th scope="col">Description</th>  --}}
            <th scope="col">Created At</th> 
            <th scope="col">Days left</th> 
            <th scope="col">Price</th> 
            <th scope="col">Designer</th> 
            <th scope="col"></th> 
            
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td><a href={{"/dashboard/admin/order?id=".$order->id."&category_id=".$order->category_id }}>{{ $order->id }}</a></th>
                <td><input type="checkbox" name="orders[]" /></td> 
                <td><a href={{ '/dashboard/admin/user/'.$order->user_id}}>{{ $order->user_id }}</a></td> 
                <td>{{ $order->package }}</td> 
                {{-- <td>{{ $order->logotype }}</td> 
                <td>{{ json_encode($order->style) }}</td> 
                <td>{{ $order->color }}</td> 
                <td>{{ $order->brand_name }}</td> 
                <td>{{ $order->business_field }}</td> 
                <td>{{ $order->description }}</td>  --}}
                <td>{{ $order->created_at }}</td> 
                <td>{{ $order->days_left }}</td> 
                <td>{{ $order->price }}</td> 
                <td>{{ $order->designer }}</td> 
                <td><button>Edit</button></td> 
            </th>
        @endforeach 
    </tbody>
</table>