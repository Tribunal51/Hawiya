@if(count($profiles) > 0) 

    {!! Form::open(['action' => ['AdminController@deleteProfile'], 'method' => 'POST']) !!}
    {{  Form::submit('Delete Selected Profiles', ['class' => 'btn btn-danger']) }}  
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Select</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Images</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <th scope="row">{{ $profile->id }}</th>
                    
                    <td>
                        
                        <input type="checkbox" name="selectedProfiles[]" value="{{ $profile->id }}" />   
                                 
                        
                    </td>
                    <td>{{ $profile->title }}</td>
                    <td>{{ $profile->category }}</td>
                    <td>
                        @foreach($profile->uploads as $upload)
                            <img style="width: 200px; height: 200px; border: 1px solid gray;" class="img-fluid" src="{{ '/storage/uploads/'.$upload->filename }}" />
                        @endforeach
                    </td>
                    <td>
                        {{-- <form action="ProfilesController@deleteProfile" method="POST">
                            <input type="hidden" name="id" value="{{$profile->id}}" />
                            <button type="submit" role="button" class="btn btn-danger">Delete</button>
                        </form> --}}

                        {{  Form::hidden('id', $profile->id) }}    
                        {{  Form::submit('Delete', ['class' => 'btn btn-danger']) }}           
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! Form::close() !!}

@endif
