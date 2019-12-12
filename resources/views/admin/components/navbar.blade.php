<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/dashboard/admin">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item adminNav">
                <a class="nav-link" href="/dashboard/admin/users">Users <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item adminNav">
                <a class="nav-link" href="/dashboard/admin/addProfile">Profiles</a>
            </li>
            {{-- <li class="nav-item adminNav">
                <a class="nav-link" href="/dashboard/admin/orderboard">Orders</a>
            </li> --}}
            <li class="nav-item adminNav dropdown" style="cursor:pointer">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Orders</a> 
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dashboard/admin/orderboard/commercial">Commercial</a> 
                    <a class="dropdown-item" href="/dashboard/admin/orderboard/personal">Personal</a> 
                    <a class="dropdown-item" href="/dashboard/admin/orderboard">Design</a> 
                    <a class="dropdown-item" href="/dashboard/admin/orderboard/store">Store</a> 
                </div> 
            </li> 
            <li class="nav-item adminNav dropdown" style="cursor:pointer">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Data</a> 
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dashboard/admin/databoard">Design</a> 
                    <a class="dropdown-item" href="/dashboard/admin/data/commercial/items">Commercial Items</a> 
                    <a class="dropdown-item" href="/dashboard/admin/data/businesscards">Business Card</a> 
                    <a class="dropdown-item" href="/dashboard/admin/data/personal/items">Personal Items</a>
                    <a class="dropdown-item" href="#">Option 2</a>
                </div> 
            </li> 

            
    
            {{-- <li class="nav-item adminNav dropdown" style="cursor:pointer">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Commercial</a> 
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dashboard/admin/data/commercial/items">Items</a>
                    <a class="dropdown-item" href="/dashboard/admin/data/businesscards">Business Card</a> 
                    <a class="dropdown-item">Option 2</a>
                </div> 
            </li> --}}
            <li class="nav-item adminNav">
                <a class="nav-link" href="#">Option 5</a>
            </li>
        
        
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> --}}
        </ul>
    </div>
</nav>

{{-- <v-toolbar>
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat>Link One</v-btn>
        <v-btn flat>Link Two</v-btn>
        <v-btn flat>Link Three</v-btn>
    </v-toolbar-items>
</v-toolbar> --}}
