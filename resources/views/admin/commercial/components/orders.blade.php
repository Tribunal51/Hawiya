{{-- {{ $orders }} --}}

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th> 
            <th scope="col">Item Name</th> 
            <th scope="col">User ID</th> 
            <th scope="col">Shape</th> 
            <th scope="col">Orientation</th> 
            <th scope="col">Size</th> 
            <th scope="col">Finishing</th> 
            <th scope="col">Frontside</th> 
            <th scope="col">Backside</th> 
            <th scope="col">Printing Admin</th>
            <th scope="col">Created At</th>
        </tr> 
    </thead>
    <tbody>
        
        @foreach($orders as $order)
            <tr>
                <td><a href={{"/dashboard/admin/orderboard/commercial/".$order->id}}>{{ $order->id }}</a></td> 
                <td>{{ $order->item_name }}</td>
                <td><a href={{"/dashboard/admin/user/".$order->user_id}}>{{ $order->user_id }}</a></td>
                <td>{{ $order->shape }}</td> 
                <td>{{ $order->orientation }}</td> 
                <td>{{ $order->size }}</td> 
                <td>{{ $order->finishing }}</td>
                <td><a href={{$order->frontside_file}}><img src={{$order->frontside_file}} alt={{$order->frontside_file}} class="small-img" /></a></td> 
                <td><a href={{$order->backside_file}}><img src={{$order->backside_file}} alt={{$order->backside_file}} class="small-img" /></a></td> 
                <td>{{ $order->printing_admin_name }}</td>
                <td> {{ $order->created_at }}</td> 
            </tr> 
        @endforeach
        
    </tbody> 
</table> 
