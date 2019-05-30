@if(count($users) > 0) 

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Admin Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {!! Form::open(['action' => ['AdminController@setAdmin'], 'method' => 'POST']) !!}
                        {{  Form::hidden('id', $user->id) }}               
                        {{  Form::submit($user->admin ? 'Remove Admin' : 'Set Admin', ['class' => $user->admin ? 'btn btn-danger' : 'btn btn-success']) }}
                        {!! Form::close() !!}                  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else 
    <h2>No users found!</h2>
@endif