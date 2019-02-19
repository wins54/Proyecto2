          <template v-if="menu==0">
          <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Menu</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-shopping-basket"></i>
                                            </div>
                                            <div @click="select=1,menu=1" class="text">
                                                <h2>Productos</h2>
                                                <span>Almacen</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class='fas fa-user-friends'></i>
                                            </div>
                                            <div @click="select=2,menu=2" class="text">
                                                <h2>Clientes</h2>
                                                <span>Ventas</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                            <div  @click="select=3,menu=3" class="text">
                                                <h2>Reportes</h2>
                                                <span>Compras</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!--
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060,386</h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        -->
                        </div>
                    </div> 
                </div>  
          </template>   
         <!-- END STATISTIC CHART-->