<div class="row"> 
    <div class="col">
        <img src={{$item->image}} alt={{$item->image}} class="small-img" />
    </div> 
</div> 
<hr>
<div class="row">
    <div class="col">
        <input type="checkbox" name="changeImage" id="changeImage" />
        <label for="changeImage">Change Image</label>
        <br>
        <input type="file" id="my_file" name="image" />
        
        
    </div>  
    <div class="col gallery"></div>
</div> 