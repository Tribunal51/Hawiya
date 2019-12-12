<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th> 
            <th scope="col">Name</th> 
            <th scope="col">Email</th> 
            <th scope="col">Mobile</th> 
        </tr> 
    </thead> 
    <tbody>
        @foreach($users as $user)
            <tr>
                <td><a href={{"/dashboard/sales/user/".$user->id}}>{{ $user->id }}</a></td> 
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td> 
                <td>{{ $user->mobile }}</td>
            </tr> 
        @endforeach 
    </tbody> 
</table> 