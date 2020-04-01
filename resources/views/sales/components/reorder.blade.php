
<h3>Reorder Information</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Attribute</th> 
            <th scope="col">Value</th>
        </tr> 
    </thead> 
    <tbody>
        <tr> 
            <td>Reorder Token</td> 
            <td>{{ $reorder->order_token }}</td>
        </tr>
        <tr> 
            <td>Old Quantity </td> 
            <td>{{ $order->quantity }}</td> 
        </tr> 
        <tr> 
            <td>Old Price</td> 
            <td>{{ $order->price }}</td> 
        </tr> 
        <tr> 
            <td>New Quantity </td> 
            <td>{{ $reorder->new_quantity }}</td> 
        </tr> 
        <tr>
            <td>New Price</td> 
            <td>{{ $reorder->new_price}}</td> 
        </tr> 
        <tr>
            <td>Quotation</td> 
            <td>
                <img src="{{$reorder->new_quotation}}" alt="{{$reorder->new_quotation}}" class="small-img" />
            </td> 

        </tr> 
        <tr>
            <td>Order Originally Created At</td> 
            <td>
                {{ $order->created_at }}
            </td> 
        </tr>
        <tr> 
            <td>Updated by Sales Admin</td> 
            <td>
                @if($sales_admin)
                    <a href={{"/dashboard/sales/user/".$sales_admin->id}}>{{ $sales_admin->name }}</a>
                @endif 
            </td>
        </tr> 
    </tbody> 
</table> 

<a class="btn btn-primary m-1" href={{"/dashboard/sales/reorder/".$reorder->id."/edit"}}>Edit</a>
<a class="btn btn-secondary m-1" href="/dashboard/sales/reorders">Back</a>