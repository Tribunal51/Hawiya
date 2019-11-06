@include('admin.components.navbar')
<div class="container">      
    <main>
        <center>
            @include('components.messages') 
            @yield('admin') 
            @include('admin.templates.division_template')
        </center>
    </main>
</div>