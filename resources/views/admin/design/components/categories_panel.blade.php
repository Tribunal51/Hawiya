<div class="list-group">
    @foreach($category_links as $category)
        <a type="button" class="list-group-item list-group-item-action" href={{ json_decode($category)->link }}>{{ json_decode($category)->name }}</a>
    @endforeach
</div>