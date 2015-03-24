<html>
    @include('admin.includes.head')
    <body>
        <div class = "container">

            @include('admin.includes.header')
        
        	@yield('content')

        </div>
    </body>
</html>