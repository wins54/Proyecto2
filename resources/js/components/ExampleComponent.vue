<template>
  <!-- DATA TABLE-->
  <section class="p-t-20">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Productos</h3>
                <vue-snotify></vue-snotify>
          <div class="table-data__tool">
            <!--

                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">
                                        <select class="js-select2" name="property">
                                            <option selected="selected">All Properties</option>
                                            <option value="">Option 1</option>
                                            <option value="">Option 2</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--sm">
                                        <select class="js-select2" name="time">
                                            <option selected="selected">Today</option>
                                            <option value="">3 Days</option>
                                            <option value="">1 Week</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                                </div>
            -->
            <div class="table-data__tool-right">
              <button
                @click="nuevop()"
                type="button"
                class="btn btn-secondary mb-1"
                data-toggle="modal"
                data-target="#mediumModal"
              >
                <i class="fas fa-cart-plus"></i> Agregar producto
              </button>
  
     <button
     id="app" v-on:click="seen1 = !seen1" 
                type="button"
                class="btn btn-secondary mb-1 control"
              >
         <i class="fas fa-wallet"></i> Tipo de pago
      </button>
  
              <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
  <div id="wrapper">
  <div id="app" v-on:click="seen = !seen" class="control">
     <button
                type="button"
                class="btn btn-secondary mb-1"
              >
         <i class="fas fa-user-cog"></i> Tallas de ropa
      </button>
  </div>
</div>
              </div>
   

            </div>

                <div class="rs-select2--light rs-select2--md">
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
     <button
     @click="nuevopago()"
             data-toggle="modal"
            data-target="#mediumModal"
            type="button"
            class="btn btn-success mb-1"
              >
         <i class="fas fa-plus-circle"></i> Agregar tipo de pago 
      </button>
    <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tipo de pago</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr class="tr-shadow" v-for="pago in arraypago" :key="pago.idpago">
                  <td v-text="pago.idpago"></td>
                  <td v-text="pago.nombrepago"></td>
                  <td>
                    <div class="table-data-feature">
                      <button
                        @click="editart(talla)"
                        data-toggle="modal"
                        data-target="#mediumModal"
                        class="item"
                        data-placement="top"
                        title="Editar"
                      >
                        <i class="fas fa-marker"></i>
                      </button>
                      <button
                        @click="borrarpa(pago.idpago)"
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Eliminar"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
  </div>



    <div v-if="seen" id="hide">
     <button
     @click="nuevot()"
             data-toggle="modal"
            data-target="#mediumModal"
            type="button"
            class="btn btn-success mb-1"
              >
         <i class="fas fa-plus-circle"></i> Agregar talla
      </button>
    <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Talla</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr class="tr-shadow" v-for="talla in arraytalla" :key="talla.idt">
                  <td v-text="talla.idt"></td>
                  <td v-text="talla.nombreT"></td>
                  <td>
                    <div class="table-data-feature">
                      <button
                        @click="editart(talla)"
                        data-toggle="modal"
                        data-target="#mediumModal"
                        class="item"
                        data-placement="top"
                        title="Editar"
                      >
                        <i class="fas fa-marker"></i>
                      </button>
                      <button
                        @click="borrart(talla.idt)"
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Eliminar"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
  </div>

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

                  <td>
                    <div class="table-data-feature">
                      <button
                        @click="editar(producto)"
                        data-toggle="modal"
                        data-target="#mediumModal"
                        class="item"
                        data-placement="top"
                        title="Editar"
                      >
                        <i class="fas fa-marker"></i>
                      </button>
                      <button
                        @click="borrar(producto.ida)"
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Eliminar"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- modal medium -->
    <div
      class="modal fade"
      id="mediumModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="mediumModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-if="menu==0" class="modal-title" id="mediumModalLabel">Agregar nuevo producto</h5>
            <h5 v-if="menu==1" class="modal-title" id="mediumModalLabel">Editar producto</h5>
            <h5 v-if="menu==2" class="modal-title" id="mediumModalLabel">Nueva Talla</h5>
            <h5 v-if="menu==3" class="modal-title" id="mediumModalLabel">Editar Talla</h5>
            <h5 v-if="menu==4" class="modal-title" id="mediumModalLabel">Nuevo Pago</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

<div v-if="menu==2||menu==3" class="modal-body">
            <div class="card">
              <div class="card-body">

                  <div class="form-group">                                          
                    <label class="control-label mb-1">Nombre de la talla</label>
                    <input
                      type="text"
                      class="form-control"
                      aria-required="true"
                      aria-invalid="false"
                      v-model="notalla"
                    >
                  </div>
              </div>
            </div>
</div>

<div v-if="menu==4" class="modal-body">
            <div class="card">
              <div class="card-body">

                  <div class="form-group">                                          
                    <label class="control-label mb-1">Tipo de pago</label>
                    <input
                      type="text"
                      class="form-control"
                      aria-required="true"
                      aria-invalid="false"
                      v-model="tipago"
                    >
                  </div>
              </div>
            </div>
</div>
          <div v-if="menu==1||menu==0" class="modal-body">
            <div class="card">
              <div class="card-body">
                <form action method="post" novalidate="novalidate">
                  <div class="form-group">
                    <label class="control-label mb-1">Nombre del producto</label>
                    <input
                      type="text"
                      class="form-control"
                      aria-required="true"
                      aria-invalid="false"
                      v-model="producto"
                    >
                  </div>

                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Descripción</label>
                    <input
                      type="text"
                      class="form-control"
                      aria-required="true"
                      aria-invalid="false"
                      v-model="descripcion"
                    >
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Preció</label>
                        <input
                          type="number"
                          class="form-control cc-exp"
                          data-val="true"
                          min="0"
                          data-val-required="Please enter the card expiration"
                          v-model="precio"
                        >
                        <span
                          class="help-block"
                          data-valmsg-for="cc-exp"
                          data-valmsg-replace="true"
                        ></span>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="x_card_code" class="control-label mb-1">Descuento</label>
                      <div class="input-group">
                        <input
                          type="number"
                          class="form-control"
                          data-val="true"
                          min="0"
                          data-val-required="Please enter the security code"
                          v-model="descuento"
                        >
                      </div>
                    </div>
                  </div>

                  <form v-on:submit.prevent="addNewTodo">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Cantidad</label>
                          <input type="number"  min="0"
class="form-control" v-model="newTodoText">
                          <span
                            class="help-block"
                            data-valmsg-for="cc-exp"
                            data-valmsg-replace="true"
                          ></span>
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="x_card_code" class="control-label mb-1">Talla</label>
                        <div v-if="menu==0" class="input-group">
                          <select
                            v-model="newtallas"
                            name="select"
                            id="select"
                            class="form-control"
                          >
                            <option
                              v-for="talla in arraytalla"
                              :key="talla.idt"
                              v-bind:value="{ id: talla.idt, talla: talla.nombreT }"
                              v-text="talla.nombreT"
                            ></option>
                          </select>
                          <div class="input-group-btn">
                            <button class="btn btn-primary">
                              <i class="fas fa-plus-circle"></i>
                            </button>
                          </div>
                        </div>
                        <div v-if="menu==1" class="input-group">
                          <input type="text" class="form-control" v-model="nomtalla" disabled>
                        </div>
                      </div>
                    </div>
                  </form>
                </form>

                <div class="row col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-top-campaign">
                        <tbody>
                        <tr  is="todo-item1"
                        v-for="(todo, index) in todos"
                        v-bind:key="todo.id"
                        v-bind:title="todo.title"
                        v-bind:talla="todo.talla"
                        v-on:remove="todos.splice(index, 1)">
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button
             v-if="menu==0"
              type="button"
              class="btn btn-primary"
              @click="agregar(producto,descripcion,precio,descuento,todos)"
              data-dismiss="modal"
            >Agregar</button>

               <button
               @click="editarpro(producto,descripcion,descuento,precio,newTodoText,nomtalla,idprod,idalma)"
             v-if="menu==1"
              type="button"
              class="btn btn-primary"
              data-dismiss="modal"
            >Agregar</button>

            <button
             v-if="menu==2"
             @click="agregart(notalla)"
              type="button"
              class="btn btn-primary"
              data-dismiss="modal"
            >Agregar</button>

   <button
             v-if="menu==4"
             @click="agregarpago(tipago)"
              type="button"
              class="btn btn-primary"
              data-dismiss="modal"
            >Agregar</button>

          </div>
        </div>
      </div>
      

    </div>
    <!-- end modal medium -->
  </section>
  <!-- END DATA TABLE-->
</template>

<script>
import { SnotifyPosition, SnotifyToast, SnotifyToastConfig } from "vue-snotify";
import "vue-snotify/styles/material.css";
export default {
 el1:'#wrapper',
  data() {
    return {
      seen: false,
            seen1: false,
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
      arraytalla: [],
      arrayproduc: [],
      arraypro:[],
      arraypago:[],
      descripcion: "",
      todos: [],
      option: "",
      nextTodoId: 0,
      yesAction:0,
  noAction:0,
    };
  },
computed: {},
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
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
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

 borrarpa(id) {
      let me = this;
      var url = "/borrarpago?borrar=" + id;
      axios
        .get(url)
        .then(function(response) {
          me.arrayproduc = response.data.almacen;
          me.arraypago = response.data.pago;
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
