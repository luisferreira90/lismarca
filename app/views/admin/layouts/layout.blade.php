<html>
    @include('admin.includes.head')
    <body>
        <div class = "container">

            @include('admin.includes.header')
        
        	@yield('content')
            
            @include('admin.includes.footer')

        </div>
    </body>
</html>