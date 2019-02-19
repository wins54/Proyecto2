<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <title>Fazined Jeans</title>
        <link rel="stylesheet" href="{{ url('font/css/all.css')}}">
 <link href="css/all.css" rel="stylesheet">  
     
</head>

<body>
    <div class="page-wrapper" id="app">
       
        @include('slider/menu')
        @include('slider/navegacion')
        @include('slider/estructura')

        <template v-if="select==1">
        <example-component></example-component>
        </template>

        <template v-if="select==2">
        <cliente-component></cliente-component>
        </template>   

         <template v-if="select==3">
        <reportes-component></reportes-component>
        </template>

        
            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2019 International Corporation of Business.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
<script src="js/app.js" ></script> 
<script src="js/plantilla.js"></script>

</body>

</html>
