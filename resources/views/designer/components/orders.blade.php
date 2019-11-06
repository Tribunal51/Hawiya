{{-- {{ $orders }} --}}


@if(count($orders) > 0) 

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Category</th>
                <th scope="col">Package Name</th> 
                <th scope="col">Product Name</th>
                <th scope="col">Created At</th> 
                <th scope="col">Price</th>  
                
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row"><a href="{{'/dashboard/designer/order?id='.$order->id.'&category_id='.$order->category_id}}">{{ $order->order_id }}</a></th>  
                    <td>{{ $order->category_name }}</td>
                    <td>{{ $order->package }}</td> 
                    <td>{{ $order->products }}</td>
                    <td>{{ $order->created_at }}</td> 
                    <td>{{ $order->price }}</td>
                </th>
            @endforeach 
        </tbody>
    </table>

@endif 