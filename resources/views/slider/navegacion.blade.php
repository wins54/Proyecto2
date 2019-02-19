  <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span"></span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a @click="select=0,menu=0" href="#" >Inicio</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li v-if="select==1" class="list-inline-item">Productos</li>
                                        <li  v-if="select==0" class="list-inline-item">Principal</li>
                                        <li  v-if="select==2" class="list-inline-item">Clientes</li>
                                        <li  v-if="select==3" class="list-inline-item">Reportes</li>

                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->