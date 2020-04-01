@if(count($users) > 0) 

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Super Admin</th>
                <th scope="col">Printing Admin</th> 
                <th scope="col">Designer</th> 
                <th scope="col">Store Admin</th> 
                <th scope="col">Sales Admin</th> 
                <th scope="col">Star Account</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><a href={{"/dashboard/admin/user/".$user->id}}>{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    {{-- <td>
                        {!! Form::open(['action' => ['AdminController@setAdmin'], 'method' => 'POST']) !!}
                        {{  Form::hidden('id', $user->id) }}               
                        {{  Form::submit($user->admin ? 'Remove Admin' : 'Set Admin', ['class' => $user->admin ? 'btn btn-danger' : 'btn btn-success']) }}
                        {!! Form::close() !!}  </td> --}}
                    <td class="small-text">    
                        {{ link_to_action('AdminController@toggleAdmin', $user->admin ? 'Remove Admin' : 'Set Admin', ['id' => $user->id, 'type' => 'super_admin'], ['class' => $user->admin ? 'btn btn-danger' : 'btn btn-success']) }}</td>                 
                        {{-- {!! Form::open(['action' => 'AdminController@toggleAdmin', 'method' => 'POST']) !!}
                        {{  Form::hidden('id', $user->id) }}   
                        {{ Form::hidden('type', 'super_admin') }}            
                        {{  Form::submit($user->admin ? 'Remove Admin' : 'Set Admin', ['class' => $user->admin ? 'btn btn-danger' : 'btn btn-success']) }}
                        {!! Form::close() !!} --}}
                    </td>
                    <td class="small-text">
                        {{ link_to_action('AdminController@toggleAdmin', $user->printing_admin ? 'Remove Printing Admin' : 'Set Printing Admin', ['id' => $user->id, 'type' => 'printing_admin'], ['class' => $user->printing_admin ? 'btn btn-danger' : 'btn btn-success']) }}</td>
                    </td> 
                    <td class="small-text"> 
                        {{ link_to_action('AdminController@toggleAdmin', $user->designer ? 'Remove Designer' : 'Set Designer', ['id' => $user->id, 'type' => 'designer'], ['class' => $user->designer ? 'btn btn-danger small' : 'btn btn-success']) }}
                    </td> 
                    <td class="small-text"> 
                        {{ link_to_action('AdminController@toggleAdmin', $user->store_admin ? 'Remove Store Admin' : 'Set Store Admin' , ['id' => $user->id, 'type' => 'store_admin'], ['class' => $user->store_admin ? 'btn btn-danger' : 'btn btn-success']) }}
                    </td> 
                    <td class="small-text"> 
                        {{ link_to_action('AdminController@toggleAdmin', $user->sales_admin ? 'Remove Sales Admin' : 'Set Sales Admin', ['id' => $user->id, 'type' => 'sales_admin'], ['class' => $user->sales_admin ? 'btn btn-danger' : 'btn btn-success']) }}
                    </td> 
                    <td class="small-text">
                        {{ link_to_action('AdminController@toggleStar', $user->star ? 'Remove Star' : 'Set Star', ['id' => $user->id], ['class' => $user->star ? 'btn btn-danger': 'btn btn-primary']) }}
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@else 
    <h2>No users found!</h2>
@endif

@push('head')
    <style>
        .btn {
            font-size: 0.7rem !important;
        }
    </style> 
@endpush