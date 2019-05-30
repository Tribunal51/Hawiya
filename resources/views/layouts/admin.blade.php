@include('admin.components.navbar')
<div class="container">      
    <main>
        <center>
            @include('admin.components.messages') 
            @yield('admin')
        </center>
    </main>
</div>