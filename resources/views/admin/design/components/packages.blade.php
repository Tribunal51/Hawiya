@if(count($data) > 0)

    {!! Form::open(['action' => ['AdminController@deletePackage'], 'method' => 'POST']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete Selected Packages', ['class' => 'btn btn-danger mb-2']) }}
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Select</th> 
                <th scope="col">Title</th> 
                <th scope="col">Title (Arabic)</th>
                @if($data['packages'][0]->posts > 0)
                    <th scope="col">Posts</th>
                @endif
                <th scope="col">Image</th>
                <th scope="col">Image (Arabic)</th>
                <th scope="col">Old Price</th> 
                <th scope="col">New Price</th>
                <th scope="col"></th> 
                
            </tr>
        </thead>
        <tbody>
            @foreach($data['packages'] as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th> 
                    <td><input type="checkbox" name="packages[]" value={{$item->id}} /></td> 
                    <td>{{ $item->title }}</td> 
                    <td>{{ $item->title_ar }}</td>
                    @if($data['packages'][0]->posts > 0)
                        <td>{{ $item->posts }}</td>
                    @endif
                    <td><img src="{{ $item->image }}" alt="{{$item->image}}" class="small-img" /></td>
                    <td><img src="{{ $item->image_ar}}" alt="{{$item->image_ar}}" class="small-img" /></td>
                    <td>{{ $item->old_price }}</td> 
                    <td>{{ $item->new_price }}</td>
                    <td>{{ link_to_action('PagesController@editPackage', 'Edit', ['id' => $item->id], ['class' => 'btn btn-secondary'])}}</td> 
                </th>
            @endforeach 
        </tbody>
    </table>
@endif 