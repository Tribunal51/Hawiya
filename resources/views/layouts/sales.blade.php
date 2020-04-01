@include('sales.components.navbar')

<div class="container">
    <main> 
        @include('components.messages')
        {{-- <a href={{URL::previous()}} class="btn btn-secondary">Back</a> --}}
        @yield('admin')
    </main>
</div> 