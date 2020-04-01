{!! Form::open(['action' => ['SalesAdminController@updateReorder', 'id' => $reorder->id], 'method' => 'POST', 'files' => true]) !!}
    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::hidden('sales_admin_id', $user->id) !!}
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
                <td><input type="number" step="0.01" name="new_price" value="{{$reorder->new_price}}" /></td> 
            </tr> 
            <tr>
                <td>Quotation</td> 
                <td>
                    
                    @if($reorder->new_quotation)
                        <img src="{{$reorder->new_quotation}}" alt="{{$reorder->new_quotation}}" class="small-img" />
                    @else 

                    @endif
                    <hr />
                    <div class="flex-row">
                        <input id="changeImage" type="checkbox" name="changeImage" />
                        <label for="changeImage">Change Image</label>
                    </div>
                    <input type="file" name="new_quotation" id="my_file" />
                    <div class="gallery"></div>
                    
                    
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
    {!! Form::submit('Save', ['class' => 'm-1 btn btn-primary']) !!}
    <a class="btn btn-secondary m-1" href={{"/dashboard/sales/reorder/".$reorder->id}}>Back</a>
{!! Form::close() !!}
