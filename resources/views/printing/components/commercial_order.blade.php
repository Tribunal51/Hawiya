<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th> 
        </tr> 
    </thead>
    <tbody>
        @foreach((array)json_decode($order) as $key => $value)
            <tr>
                @switch($key) 
                    @case('id')
                        <td>ID</td> 
                        <td>{{ $order->id }}</td> 
                    @break 

                    @case('item_name')
                        <td>Item Name</td> 
                        <td>{{ $order->item_name }}</td> 
                    @break 

                    @case('user_id')
                        <td>User ID</td> 
                        <td><a href={{"/dashboard/printing/user/".$order->user_id}}>{{ $order->user_id}}</a></td> 
                    @break 

                    @case('frontside_file')
                    @case('backside_file')
                        <td>{{ $key }}</td> 
                        <td><img src={{$order[$key]}} alt={{$order[$key]}} class="small-img" /></td> 
                    @break 

                    @case('shape')
                    @case('orientation')
                    @case('size')
                    @case('paper_thickness')
                    @case('finishing')
                    @case('days_left')
                    @case('created_at')
                    @case('updated_at')
                        <td>{{ $key }}</td> 
                        <td>{{ $value }}</td> 
                    @break 

                    @default 
                    @break
                @endswitch 
            </tr>
        @endforeach 
    </tbody> 
</table> 