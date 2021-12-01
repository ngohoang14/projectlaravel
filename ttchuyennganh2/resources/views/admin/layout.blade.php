<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.element.head')
</head>
<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.element.slidebar')
        <!-- partial -->
    
        <div class="page-wrapper">      
            <!-- partial:partials/_navbar.html -->
            @include('admin.element.navbar')
            <!-- partial -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- partial:partials/_footer.html -->
            @include('admin.element.footer')
            <!-- partial -->
        
        </div>
    </div>

    <!-- core:js -->
    @include('admin.element.script')
</body>
</html>    