<template>



  <!-- DATA TABLE-->
  <section class="p-t-20">


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Reportes</h3>
                <vue-snotify></vue-snotify>
          <div class="table-data__tool">


            <div class="table-data__tool-right">
              <button
id="app" v-on:click="seen2 = !seen2"                 
type="button"
                class="btn btn-secondary mb-1"
              >
                <i class="fas fa-cart-plus"></i> Reportes de graficas
              </button>
  
     <button
     id="app" v-on:click="seen1 = !seen1" 
                type="button"
                class="btn btn-secondary mb-1 control"
              >
         <i class="fas fa-wallet"></i> Reportes de ventas
      </button>
  
              <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
  <div id="wrapper">
  <div id="app" v-on:click="seen = !seen" class="control">
     <button
                type="button"
                class="btn btn-secondary mb-1"
              >
         <i class="fas fa-user-cog"></i> Deudores 
      </button>
  </div>
</div>
              </div>
   

            </div>

                <div v-if="seen1" class="rs-select2--light rs-select2--md">
                                      <label class="control-label mb-1">Productos</label>
                                        <select @change="busca(idpro)" v-model="idpro" class="form-control" name="property">
                                          <option value="0">Productos</option>
                                            <option  v-for="produ in arraypro"
                              :key="produ.idp" :value="produ.idp" v-text="produ.nombrep" ></option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

          </div>


<div v-if="seen1" id="hide">
   
    <div class="table-responsive table-responsive-data2">
             <table class="table table-data2">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Descuento</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Talla</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr class="tr-shadow" v-for="producto in arrayproduc" :key="producto.ida">
                  <td v-text="producto.nombrep"></td>
                  <td v-text="producto.descrip"></td>
                  <td v-text="producto.descuento"></td>
                  <td v-text="producto.precio"></td>
                  <td v-text="producto.cantidad"></td>
                  <td v-text="producto.nombreT"></td>
                  <td>
                    <span v-if="producto.estadoDep==1" class="status--process">Disponible</span>
                    <span v-if="producto.estadoDep==0" class="status--denied">Agotado</span>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
  </div>



    <div v-if="seen" id="hide">
    
    <div class="table-responsive table-responsive-data2">
             <table class="table table-data2">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Descuento</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Talla</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr class="tr-shadow" v-for="producto in arrayproduc" :key="producto.ida">
                  <td v-text="producto.nombrep"></td>
                  <td v-text="producto.descrip"></td>
                  <td v-text="producto.descuento"></td>
                  <td v-text="producto.precio"></td>
                  <td v-text="producto.cantidad"></td>
                  <td v-text="producto.nombreT"></td>
                  <td>
                    <span v-if="producto.estadoDep==1" class="status--process">Disponible</span>
                    <span v-if="producto.estadoDep==0" class="status--denied">Agotado</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
  </div>

          <div div v-if="seen2" id="hide" class="table-responsive table-responsive-data2">

  <div>
              <h3 class="title-5 m-b-35">CANTIDAD DE PRODUCTOS VENDIDOS</h3>
     <apexchart width="100%"
      height="350"  type="bar" :options="chartOptions" :series="series"></apexchart>
   </div>

   
  <div>
        <h3 class="title-5 m-b-35">TOTAL DE PRODUCTOS VENDIDOS</h3>
     <apexchart width="100%"
      height="350"  type="bar" :options="chartOptions" :series="series2"></apexchart>
   </div>

           
          </div>
        </div>
      </div>
    </div>

  
  </section>
  <!-- END DATA TABLE-->
</template>

<script>
import { SnotifyPosition, SnotifyToast, SnotifyToastConfig } from "vue-snotify";
import "vue-snotify/styles/material.css";
import VueApexCharts from 'vue-apexcharts'
import ApexCharts from 'apexcharts'


export default {
 el1:'#wrapper',
   el2: '#appl',
 name: "Chart",
  components: {
    apexchart: VueApexCharts
  }
,
  data() {
    return {
      seen: false,
            seen1: false,
                        seen2: false,
      menu: 0,
      idpro:0,
      notalla:'',
      tipago:'',
      newTodoText: "",
      newtallas: "",
      producto: "",
      precio: "",
      idtalla: "",
      ida: "",
      idprod:'',
      idalma:'',
      nomtalla: "",
      descuento: "",
        nombreI1:[],
      escala1:[],
      arraytalla: [],
      arrayproduc: [],
      arraycompras:[],
      totales:[],
      arraypro:[],
      arraypago:[],
      descripcion: "",
      series:[],
      series2:[],
      todos: [],
      option: "",
      nextTodoId: 0,
      yesAction:0,
  noAction:0,
    };
  },
computed: {
chartOptions: function() {
        let me= this;
        return {
          chart: {
            id: 'vuechart-example'
          },
          xaxis: {
            categories: this.nombreI1
          }
         
        }


        } 
},
  toast: {
    position: SnotifyPosition.rightTop
  },
  methods: {
alerta(){
   this.$snotify.success("Se ingresaron los datos", "Exito", {
        timeout: 2000,
        showProgressBar: false,
        closeOnClick: false,
        pauseOnHover: true
      });
},
nuevot(){
  this.menu=2;
}
,
nuevopago(){
  this.menu=4;
}
,
    nuevop(){
      let me = this;
      this.menu=0;
             me.producto = "",
            me.descripcion = "",
            me.precio = "",
            me.descuento = "",
            me.nextTodoId = 0,
            me.todos = [],
            me.newTodoText = "",
            me.nomtalla = ""
    },
    addNewTodo: function() {
      this.todos.push({
        id: this.nextTodoId++,
        title: this.newTodoText,
        talla: this.newtallas.talla,
        idtalla: this.newtallas.id
      });
      (this.newTodoText = ""), (this.newtallas = "");
    },
    editar(datos = []) {
      //this.ida=1;
      this.menu = 1;
      console.log(datos);
      this.producto = datos["nombrep"];
      this.descripcion = datos["descrip"];
      this.descuento = datos["descuento"];
      this.precio = datos["precio"];
      this.newTodoText = datos["cantidad"];
      this.nomtalla = datos["nombreT"];
    this.idprod=datos["idp"]
      this.idalma=datos["ida"]
      //this.nomb=datos['nombre'];
      //this.fec=datos['fecha'];
      //this.idM=datos['id'];
    },

    lista() {
      let me = this;
      axios
        .get("/producto")
        .then(function(response) {
          //  me.arraymascota=response.data.mascota;
          me.arraytalla = response.data.talla;
          me.arrayproduc = response.data.almacen;
          me.arraypro=response.data.producto;
          me.arraypago=response.data.pago;
          me.lista1();

        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
 lista1() {
      let me = this;
      axios
        .get("/reportes")
        .then(function(response) {
          //  me.arraymascota=response.data.mascota;
          me.arraycompras = response.data.pedido2;
                 me.arraycompras.map(function(x){
                   me.nombreI1.push(x.producto);
                   me.escala1.push(x.cantidad);
                   me.totales.push(x.total);
               }); 
me.series.push({
        name: 'Cantidad vendida',
        data: me.escala1,
      });

me.series2.push({
        name: 'Total vendido',
        data: me.totales,
      });

        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    }
    ,
    borrar(id) {
      let me = this;
      var url = "/borrarp?borrar=" + id;
      axios
        .get(url)
        .then(function(response) {
          me.arrayproduc = response.data.almacen;

     me.$snotify.async('Eliminando registro', 'Eliminando', () => new Promise((resolve, reject) => {
    setTimeout(() => resolve({
       title: 'Exelente!!!',
       body: 'Se elimino el registro!',
       config: {
         closeOnClick: true,
               timeout: 600,
       }
    }), 500);
}));

        })
        .catch(function(error) {
          console.log(error);
        });
    },

    busca(id) {

      if(id==0){

this.lista();
      }
      else{
      let me = this;
                me.Grafica() ;

      var url = "/busca?borrar=" + id;
      axios
        .get(url)
        .then(function(response) {
          me.arrayproduc = response.data.almacen;

        })
        .catch(function(error) {
          console.log(error);
        });
        }
    },
    agregar(producto, descripcion, precio, descuento, todos) {
      let me = this;
      axios
        .post("/nuevos", {
          producto: producto,
          descripcion: descripcion,
          precio: precio,
          descuento: descuento,
          almacen: todos
        })
        .then(function(response) {
          // window.location.href = '/';
          console.log(response);
          me.producto = "",
            me.descripcion = "",
            me.precio = "",
            me.descuento = "",
            me.nextTodoId = 0,
            me.todos = [],
            me.$snotify.success("Se ingresaron los datos", "Exito", {
        timeout: 2000,
        showProgressBar: false,
        closeOnClick: false,
        pauseOnHover: true
      });
           me.lista();
       

        })
        .catch(function(error) {
          console.log(error);
        });
    }

    ,

    editarpro(producto,descripcion,descuento,precio,newTodoText,nomtalla,idprod,idalma) {
      let me = this;
      axios
        .post("/editpro", {
          producto: producto,
          descripcion: descripcion,
          precio: precio,
          descuento: descuento,
          cantidad:newTodoText,
      nombreT:nomtalla,
   idp:idprod,
  tida:idalma
 })
        .then(function(response) {
          // window.location.href = '/';
          console.log(response);
          me.producto = "",
            me.descripcion = "",
            me.precio = "",
            me.descuento = "",
            me.nextTodoId = 0,
            me.newTodoTex= "",
me.nomtalla= '',
me.idprod= '',
me.idalma= '',
            me.$snotify.success("Se actualizaron los datos", "Exito", {
        timeout: 2000,
        showProgressBar: false,
        closeOnClick: false,
        pauseOnHover: true
      });
           me.lista();

        })
        .catch(function(error) {
          console.log(error);
        });
    }

,
agregart(notalla) {
      let me = this;
      axios
        .post("/talla", {
          talla: notalla,
        })
        .then(function(response) {
          // window.location.href = '/';
          console.log(response);
          me.notalla = "",
           me.alerta()
           me.lista();
  
        })
        .catch(function(error) {
          console.log(error);
        });
    },

agregarpago(tipago) {
      let me = this;
      axios
        .post("/pagosnuevo", {
          pagos: tipago,
        })
        .then(function(response) {
          // window.location.href = '/';
          me.tipago='';
          console.log(response);
           me.alerta()
           me.lista();
  
        })
        .catch(function(error) {
          console.log(error);
        });
    },

     editart(datos = []) {
      //this.ida=1;
      this.menu = 3;
      console.log(datos);
      this.notalla = datos["nombreT"];
    },

    borrart(id) {
      let me = this;
      var url = "/borrart?borrar=" + id;
      axios
        .get(url)
        .then(function(response) {
          me.arrayproduc = response.data.almacen;
          me.arraytalla = response.data.talla;
     me.$snotify.async('Eliminando registro', 'Eliminando', () => new Promise((resolve, reject) => {
    setTimeout(() => resolve({
       title: 'Exelente!!!',
       body: 'Se elimino el registro!',
       config: {
         closeOnClick: true,
               timeout: 600,
       }
    }), 500);
}));
        })
        .catch(function(error) {
          console.log(error);
        });
    },

 Grafica() 
 
 {
   

    },


  },
  mounted() {
    this.lista();
  }
};
Vue.component("todo-item1", {
  template:
    '\
    <td>\
      <label for="cc-exp" class="control-label mb-1">Cantidad:</label>\
      {{ title }}\
      <label for="cc-exp" class="control-label mb-1">Talla:</label>\
      {{ talla }}\
      <button class="btn btn-danger" v-on:click="$emit(\'remove\')">Remove</button>\
    </td>\
  ',
  props: ["title", "talla"]
});
</script>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);

body {
  font-family: Roboto, sans-serif;
}

#chart {
  max-width: 650px;
  margin: 35px auto;
}
</style>

