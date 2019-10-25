@include('_partial/_head')

<body class="fix-header fix-sidebar card-no-border"> 
    <div id="main-wrapper">

        @include('_partial/_header')
        

        @include('_partial/_left_sidebar')
        
         
        <div class="page-wrapper"> 
            <div class="container-fluid">
                 
                @include('_partial/_page_title')

                @yield('content') 

                 @include('_partial/_right_sidebar')
            </div>
             
            @include('_partial/_copyright')

        </div>
         
    </div> 
    
    @include('_partial/_all_script')
     
</body>

 
</html>