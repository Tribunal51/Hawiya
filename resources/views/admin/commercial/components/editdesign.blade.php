{!! Form::open(['action' => ['CommercialItemsController@editDesign', 'id' => $design->id], 'method' => 'POST', 'files' => true]) !!}
    {!! Form::hidden('_method', 'PUT') !!}

    @csrf 

    <h3> Edit Design</h3>

    <table class="table">
        <thead class="thead-dark">
            <tr> 
                <th scope="col">Attribute</th> 
                <th scope="col">Value</th> 
            </tr> 
        </thead> 
        <tbody>
            <tr> 
                <td>Design Name</td> 
                <td><input type="text" value="{{$design->design_name}}" name="design_name" required /></td>
            </tr> 
            @if(sizeof($options_info['shape']) > 0)
                <tr>
                    <td>Shape</td>
                    <td>
                        <select name="shape">
                            <option value={{null}} {{ $design->fold === null ? 'selected' : ''}}></option>
                            @foreach($options_info['shape'] as $shape)
                                <option value="{{$shape}}" {{ strtolower($shape) === strtolower($design->shape) ? 'selected' : null }}>{{ $shape }}</option>
                            @endforeach
                        </select> 
                    </td>
                </tr> 
            @endif 

            @if(sizeof($options_info['orientation']) > 0)
            <tr>
                <td>Orientation</td>
                <td> 
                    <select name="orientation">
                        <option value={{null}} {{ $design->fold === null ? 'selected' : ''}}></option>
                        @foreach($options_info['orientation'] as $orientation)
                            <option value="{{$orientation}}" {{ strtolower($orientation) === strtolower($design->orientation) ? 'selected' : ''}}>{{ $orientation }}</option>
                        @endforeach 
                    </select>
                </td> 
            </tr> 
            @endif 

            @if(sizeof($options_info['fold']) > 0)
            <tr>
                <td>Fold</td> 
                <td>
                    <select name="fold">
                        <option value={{null}} {{ $design->fold === null ? 'selected' : ''}}></option>
                        @foreach($options_info['fold'] as $fold) 
                            <option value="{{$fold}}" {{ strtolower($fold) === strtolower($design->fold) ? 'selected' : ''}}>{{$fold}}</option>
                        @endforeach 
                                
                    </select> 
                </td> 
            </tr>
            @endif 

            <tr>
                <td>Type</td> 
                <td>
                    <select name="type">
                        <option value={{null}} {{ !$design->type ? 'selected' : ''}}></option>
                        @foreach(['Type 1', 'Type 2'] as $type) 
                            <option value="{{$type}}" {{ strtolower($type) === strtolower($design->type) ? 'selected' : ''}}>{{$type}}</option>
                        @endforeach         
                    </select> 
                </td> 
            </tr> 
            <tr>
                <td>Price with Cover</td>
                <td>
                    <input type="number" step="0.01" id="price1" value={{$design->price_with_cover }} name="price_with_cover" class="col-md-2" required />
                </td> 
                
            </tr> 

            <tr>
                <td>Price without Cover</td> 
                <td>
                    <input type="number" step="0.01" class="col-md-2" value={{$design->price_without_cover}} name="price_without_cover" id="price2" required /> 
                </td>
            </tr> 


            <tr>
                <td>Front Base Photo</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            @if($design->frontbasephoto)
                                <img src={{$design->frontbasephoto}} alt={{$design->frontbasephoto}} class="small-img" />
                            @endif 
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeFrontBasePhoto"  />
                            <label for="frontbasephoto">Change Image</label>
                            <br>
                            <input type="file" id="frontbasephoto" name="frontbasephoto" />
                            
                            
                        </div>  
                        <div class="col frontbasephoto"></div>
                    </div> 
                </td>
            </tr>
            <tr>
                <td>Front Text Photo</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            @if($design->fronttextphoto) 
                                <img src={{$design->fronttextphoto}} alt={{$design->fronttextphoto}} class="small-img" />
                            @endif 
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeFrontTextPhoto" />
                            <label for="fronttextphoto">Change Image</label>
                            <br>
                            <input type="file" id="fronttextphoto" name="fronttextphoto" />
                            
                            
                        </div>  
                        <div class="col fronttextphoto"></div>
                    </div> 
                </td>
            </tr>
            <tr>
                <td>Back Base Photo</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            @if($design->backbasephoto)
                                <img src={{$design->backbasephoto}} alt={{$design->backbasephoto}} class="small-img" />
                            @endif 
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeBackBasePhoto" />
                            <label for="backbasephoto">Change Image</label>
                            <br>
                            <input type="file" id="backbasephoto" name="backbasephoto" />
                        </div>  
                        <div class="col backbasephoto"></div>
                    </div> 
                </td>
            </tr>
            <tr>
                <td>Back Text Photo</td> 
                <td>
                    <div class="row"> 
                        <div class="col">
                            @if($design->backtextphoto) 
                                <img src={{$design->backtextphoto}} alt={{$design->backtextphoto}} class="small-img" />
                            @endif 
                        </div> 
                    </div> 
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="checkbox" name="changeBackTextPhoto" />
                            <label for="backtextphoto">Change Image</label>
                            <br>
                            <input type="file" id="backtextphoto" name="backtextphoto" />
                            
                            
                        </div>  
                        <div class="backtextphoto col"></div>
                    </div> 
                </td>
            </tr>
        </tbody> 
    </table> 

    



    

    {!! Form::submit('Save', ['class' => 'btn btn-primary m-1']) !!}
    
{!! Form::close() !!}

<a href={{"/dashboard/admin/data/commercial/design/".$design->id}} class="m-1 btn btn-secondary">Back</a>

@push('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            window.images = [];
            window.files = [];
            
            $('#fronttextphoto').on('change', function() {
                imagesPreview(this, 'div.fronttextphoto');
            });

            $('#frontbasephoto').on('change', function() {
                imagesPreview(this, 'div.frontbasephoto');
            });

            $('#backtextphoto').on('change', function() {
                imagesPreview(this, 'div.backtextphoto');
            });

            $('#backbasephoto').on('change', function() {
                imagesPreview(this, 'div.backbasephoto');
            });
            
            
            function dataURLtoBlob() {
                console.log('Inside dataURLtoBlob');
                var arr = dataurl.split(',');
                var mime = arr[0].match(/:(.*?);/)[1];
                var bstr = atob(arr[1]);
                var n = bstr.length;
                var u8arr = new Uint8Array(n);
                
                while(n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new Blob([u8arr], {type:mime});
            }

            
            function getBase64(file) {
                var reader = new FileReader();
                var convertedFile = '';
                reader.readAsDataURL(file);
                reader.onload = function() {
                    convertedFile = reader.result;
                    //console.log(reader.result);
                    window.files.push(reader.result);

                    //window.files.push(reader.result);
                };
                reader.onerror = function(error) {
                    
                    console.log("Error: ", error);
                };                               
                //return convertedFile;

            }
        

            // Multiple images preview in browser
        
            function imagesPreview(input, placeToInsertImagePreview) {
            // var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {   
                    var filesAmount = input.files.length;
                    console.log('Input Files', input.files);

                    window.images = input.files;
                    
                    Array.from(window.images).forEach(file => {
                        getBase64(file);
                    });
                    console.log('Window.files', window.files);
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img class="small-img">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                        // console.log(input.files[i]);
                        

                        
                        

                    }
                }

            };

            

            
        });

        
    </script>
@endpush 