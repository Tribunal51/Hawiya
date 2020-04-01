
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/dashboard/store">Store Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item adminNav">
                <div class="d-flex flex-row">
                    <a class="nav-link" href="/dashboard/store/orders">Orders</a>@if(sizeof($pending_orders) > 0)<div class="circle">{{ sizeof($pending_orders) }}</div>@endif
                </div>
            </li>
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

@push('head')
    <style> 
        .circle {
            border-radius: 50%;
            width: 1rem;
            height: 1rem;
            font-size: 0.75rem;
            background-color: white;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style> 
@endpush 
    