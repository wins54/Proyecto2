<template>
  <!-- DATA TABLE-->
  <section class="p-t-10">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Ventas</h3>
                          <vue-snotify></vue-snotify>
          <div class="table-data__tool">
         
         
            <div class="table-data__tool-right">
              <button
              @click="nuevop()"
              data-toggle="modal"
                type="button"
                class="btn btn-secondary mb-1"
                :data-target="modal"
              >
                <i class="fas fa-cart-plus"></i> Agregar venta
              </button>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
  
  <div id="wrapper">
  <div id="app" v-on:click="seen = !seen" class="control">
     <button
                type="button"
                class="btn btn-secondary mb-1"
              >
         <i class="fas fa-shopping-bag"></i> Detalle Compra
      </button>
  </div>
</div>
              </div>
            </div>

 <div class="rs-select2--light rs-select2--md">
                                      <label class="control-label mb-1">Buscar cliente</label>
                                        <input  v-model="busca" type="text" class="form-control" name="property">                                       
                                    </div>


          </div>

    

          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>Nombre del cliente</th>
                  <th>Días</th>
                  <th>Cantidad</th>
                  <th>Fecha</th>
                  <th>Saldo</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody v-for="detalle in filtrar" :key="detalle.iddet">
                <tr class="tr-shadow" >
                  <td v-text="detalle.nombrecli"></td>
                  <td v-text="detalle.dias"></td>
                  <td v-text="detalle.cantidadpro"></td>
                  <td v-text="detalle.fechaCompra"></td>
                  <td v-text="detalle.saldo"></td>
                <td v-text="detalle.totalpe"></td>
                <td v-if="detalle.dias<=30">
                    <span class="status--process">Activo</span>
                </td>
                <td v-if="detalle.dias>=30">
                    <span class="status--denied">Sin canselar</span>
                  </td>
                  <td>
                    <div class="table-data-feature">
                      <button
                      @click="editar(detalle)"
                        class="item"
                        data-placement="top"
                        title="Editar"
                        data-toggle="modal"
                      data-target="#mediumModal"
                      >
                        <i class="fas fa-marker"></i>
                      </button>
                      <button
                      @click="borrar(detalle.idpe,detalle.idcliente)"
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Eliminar"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                      <!--
                      <button
                     @click="modal='#mediumModal'"
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Información"
                      >
                        <i class="fas fa-file"></i>
                      </button>
                      -->
                    </div>
                  </td>

             
                </tr>
<div>      
                    <div v-if="seen" id="hide">
    <div class="table-responsive table-responsive-data2">
          <table class="table table-data2">
              <thead>
                <tr>
                  <!--<th>Nombre del cliente</th>-->
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                 <!-- <th>Estado</th>-->
                  <th></th>
                </tr>
              </thead>
              <tbody class="tr-shadow" v-for="detalles in arraydetalle" :key="detalles.iddet" >
                <tr v-if="detalle.idpe==detalles.idpe">
                 <!-- <td v-text="detalle.nombrecli"></td>-->
                  <td v-text="detalles.nombrep+' '+detalles.nombreT" class="desc"></td>
                  <td v-text="detalles.precio"></td>
                  <td v-text="detalles.cantidade"></td>
                <td v-text="detalles.subtotal"></td>
                <!--<td>
                    <span class="status--process">Activo</span>
                  </td>
                  <td>
                    <div class="table-data-feature">
                      <button
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Editar"
                      >
                        <i class="fas fa-marker"></i>
                      </button>
                      <button
                        class="item"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Eliminar"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                  -->
                </tr>
              </tbody>
            </table>
    
    </div>
  </div>
           
</div>
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
      :class="{'mostrar' : modal}"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-if="menu==0" class="modal-title" id="mediumModalLabel">Nuevo pedido</h5>
            <h5 v-if="menu==1" class="modal-title" id="mediumModalLabel">Editar pedido</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <form action method="post" novalidate="novalidate">
                  <div class="form-group">
                    <label class="control-label mb-1">Nombre del cliente</label>
                    <input
                      @keyup="isHidden = true"
                      id="cc-pament"
                      type="text"
                      class="form-control"
                      aria-required="true"
                      aria-invalid="false"
                      v-model="nomcliente"
                      @click.stop="isHidden = false"
                    >
                    <ul id="myUL" v-if="isHidden">
  <li v-for="cliente in filtracli" :key="cliente.idcliente" @click="editar1(cliente)"><a v-text="cliente.nombrecli" ></a></li>
</ul>
                        <div v-if="menu==0" class="form-group row div-error">
                          <div class="text-center text-error">
                                        <div class="status--denied" v-text="errorMostrar">
                                        </div>
                          </div>
                          </div>

                          
                  </div>
 <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Direccón</label>
                        <input
                          type="text"
                          class="form-control cc-exp"
                                                v-model="direccion"
                          data-val-required="Please enter the card expiration"
                        >
                        <span
                          class="help-block"
                          data-valmsg-for="cc-exp"
                          data-valmsg-replace="true"
                        ></span>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="x_card_code" class="control-label mb-1">Teléfono</label>
                      <div class="input-group">
                        <input
                          type="number"
                          class="form-control cc-cvc"
                          data-val="true"
                           v-model="telefono"
                          autocomplete="off"
                          min="0"
                        >
                      </div>
                    </div>
                  </div>
                  
   <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Fecha</label>
                        <input
                          type="date"
                          class="form-control"
                         v-model="fecha"
                        >
                        <span
                          class="help-block"
                          data-valmsg-for="cc-exp"
                          data-valmsg-replace="true"
                        ></span>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="x_card_code" class="control-label mb-1">Nit</label>
                      <div class="input-group">
                        <input
                          type="number"
                          class="form-control cc-cvc"
                          data-val="true"
                          data-val-required="Please enter the security code"
                                                v-model="nit"
                                                min="0"
                        >
                      </div>
                    </div>
                  </div>


    <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Cuenta bancaria</label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="cuenta"
                           id="new-todo"
                        >
                        <span
                          class="help-block"
                          data-valmsg-for="cc-exp"
                          data-valmsg-replace="true"
                        ></span>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="x_card_code" class="control-label mb-1">Tipo de pago</label>
                      <div class="input-group">
                       <select data-live-search="true" v-model="pago" name="select" id="select" class="form-control">
                          <option  v-for="pago in arraypago" :key="pago.idpago" v-bind:value="pago.idpago"
                              v-text="pago.nombrepago" ></option>
                        </select>
                        
                      </div>

                    </div>
                  </div>


                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Saldo</label>
                        <input
                          type="number"
                          class="form-control cc-exp"
                          value
                                                v-model="saldo"
                          data-val-required="Please enter the card expiration"
                          min="0"
                        >
                        <span
                          class="help-block"
                          data-valmsg-for="cc-exp"
                          data-valmsg-replace="true"
                        ></span>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="x_card_code" class="control-label mb-1">Total</label>
                      <div class="input-group">
                        <input
                         v-if="menu==0"
                          type="number"
                          class="form-control cc-cvc"
                            v-model="totales"
                          data-val-required="Please enter the security code"
                          disabled
                        >
                        <input
                         v-if="menu==1"
                          type="number"
                          class="form-control cc-cvc"
                                                v-model="total"
                          data-val-required="Please enter the security code"
                          disabled
                        >
                      </div>
                    </div>
                  </div>

<form v-on:submit.prevent="addNewTodo" v-if="menu==0">  
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Cantidad</label>
                        <input
                          type="number"
                          class="form-control"
                          v-model.number="newTodoText"
                           id="new-todo"
                           min="0"
                        >
                        <div class="form-group row div-error">
                          <div class="text-center text-error">
                                        <div class="status--denied" v-text="errorproducto">
                                        </div>
                          </div>
                          </div>

                      </div>
                    </div>
                    <div class="col-6">
                      <label for="x_card_code" class="control-label mb-1">Producto</label>
                      <div class="input-group">
                       <select  v-model="newtallas" class="form-control">
                          <option  v-for="producto in arrayalmacen" :key="producto.ida"
                           v-bind:value="{ id: producto.ida, talla: producto.nombrep, precio:producto.precio ,descuento:producto.descuento,cantidad:producto.cantidad}"
                              v-text="producto.nombrep+' '+producto.nombreT"></option>
                        </select>
                        <div class="input-group-btn">
    <button class="btn btn-primary"><i class="fas fa-plus-circle"></i></button> 
</div>
                      </div>


                    </div>
                  </div>

</form>

<div class="form-group">
     <ul>
    <li
    class="list-inline-item active"
      is="todo-item"
      v-for="(todo, index) in todos"
      v-bind:key="todo.id"
      v-bind:title="todo.title"
      v-bind:talla="todo.talla"
      v-bind:subto="todo.subto"
      v-on:remove="todos.splice(index, 1)"
    ></li>
  </ul>

</div>


                </form>
              </div>
            </div>
                                <h6 v-if="menu==0 && unidades" class="pb-4 display-5">Unidades disponibles:{{unidades}}</h6>
          </div>
          <div class="modal-footer">
            <button @click="cerrarmodal()" type="button" class="btn btn-secondary" :data-dismiss="cerrarmodal1">Cancelar</button>
            <button   :data-dismiss="cerrarmodal1" v-if="menu==0"  @click="agregar(nomcliente,clienteid,telefono,direccion,fecha,nit,saldo,total,cuenta,pago,preci,todos,cantidad)" class="btn btn-primary">Agregar</button>
            <button  :data-dismiss="cerrarmodal1" @click="editarpedido(nomcliente
,telefono
,direccion
,fecha
,nit
,saldo
,total
,cuenta
,pago,idcliente,
idpedido
)"
v-if="menu==1"  class="btn btn-primary">Actualizar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal medium -->
  </section>
  <!-- END DATA TABLE-->
</template>

<script>
Vue.component('todo-item', {
  template: '\
    <li>\
      <label for="cc-exp" class="control-label mb-1">Cantidad: </label>\
      {{ title }}\
       <label for="cc-exp" class="control-label mb-1">Producto: </label>\
      {{ talla }}\
      <label for="cc-exp" class="control-label mb-1">Subtotal: </label>\
{{subto}}\
      <button class="btn btn-danger" v-on:click="$emit(\'remove\')">Remove</button>\
    </li>\
  ',
  props: ['title','talla','precios','subto','ida','unidad']
})
export default {
   el1:'#wrapper',
 data (){

            return {
              modal:0,
              busca:"",
              seen: false,
              isHidden: false,
              nomcliente:'',
              telefono:'',
              direccion:'',
              clienteid:0,
              fecha:'',
              nit:'',
              saldo:'',
              total:'',
              cuenta:'',
              pago:'',
              preci:0,
              cerrarmodal1:0,
              idcliente:0,
              idpedido:0,
              contando:0,
              unidades:0,
              errorMostrar:'',
              errorproducto:'',
newTodoText:0,
newtallas:'',
    todos: [],
    producto:'',
    nextTodoId: 0,
    cantidad:0,
arrayalmacen:[],
arraycliente:[],
arraydetalle:[],
arraypedido:[],
arraypago:[],
menu:0
            }}
  ,

             methods: {
              cerrarmodal(
              )
              {
                this.cerrarmodal1="modal";
              },
              validacion(){
                if (!this.nomcliente) {
                  this.errorMostrar="El nombre del cliente no puede estar vacío.";
                }

                 if (!this.todos.length) {
                  this.errorproducto="Inserte un producto no puede estar vacío.";
                }
                
              },
   nuevop(){
this.menu = 0;
this.nomcliente='';
this.telefono='';
this.direccion='';
this.fecha='';
this.nit='';
this.saldo='';
this.total='';
this.cuenta='';
this.pago='';
this.newTodoText=0,
this.newtallas=''
this.modal='#mediumModal'
this.cerrarmodal1=""
this.isHidden=false;
this.todos=[];
   }
   ,

    editar1(datos = []) {
      //this.ida=1;
this.nomcliente= datos["nombrecli"];
this.telefono= datos["telefono"];
this.direccion= datos["direccion"];
this.fecha= datos["fechaCompra"];
this.nit= datos["nit"];
this.isHidden=false;
this.clienteid=datos["idcliente"];
      //this.nomb=datos['nombre'];
      //this.fec=datos['fecha'];
      //this.idM=datos['id'];
    }
   ,
    editar(datos = []) {
      //this.ida=1;
      this.menu = 1;
this.nomcliente= datos["nombrecli"];
this.telefono= datos["telefono"];
this.direccion= datos["direccion"];
this.fecha= datos["fechaCompra"];
this.nit= datos["nit"];
this.saldo= datos["saldo"];
this.total= datos["totalpe"];
this.cuenta= datos["cuenta"];
this.pago= datos["idpago"];
this.idcliente= datos["idcliente"];
this.idpedido= datos["idpe"];
this.cerrarmodal1="";
      //this.nomb=datos['nombre'];
      //this.fec=datos['fecha'];
      //this.idM=datos['id'];
    },

    addNewTodo: function () {
let me = this;
      //this.cantidad=this.cantidad+this.newTodoText;
      //this.preci=this.newtallas.precio;
     // this.total=this.preci*this.cantidad;
      this.todos.push({
        id: this.nextTodoId++,
        ida:this.newtallas.id,
        title: this.newTodoText,
        talla: this.newtallas.talla,
        precios:this.newtallas.precio,
        unidad:(this.newtallas.cantidad-this.newTodoText),
        subto:(this.newTodoText*this.newtallas.precio)-this.newtallas.descuento,
      })
      this.newTodoText = ''
      this.newTodoText=0,
      this.newtallas=''
      this.contando=0;
    },
 lista() {
      let me = this;
      axios
        .get("/pedidos")
        .then(function(response) {
          //  me.arraymascota=response.data.mascota;
me.arrayalmacen = response.data.almacen;
me.arraycliente= response.data.cliente;
me.arraydetalle=response.data.detalle;
me.arraypedido=response.data.pedido;
me.arraypago=response.data.pago;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    agregar(nomcliente,clienteid
,telefono
,direccion
,fecha
,nit
,saldo
,total
,cuenta
,pago
,preci
,todos,cantidad) {
let me = this;
me.validacion();

if(me.nomcliente && me.todos.length>0)
{
me.cerrarmodal();
     axios
        .post("/nuevospedidos", {
       nomcliente:nomcliente
,telefono:telefono
,direccion:direccion
,fecha:fecha
,nit:nit
,saldo:saldo
,total:total
,cuenta:cuenta
,pago:pago
,detalle:todos
,cantidad:cantidad,
clienteid:clienteid
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
       
       
    }

,

  editarpedido(nomcliente
,telefono
,direccion
,fecha
,nit
,saldo
,total
,cuenta
,pago,idcliente,
idpedido
) {
      let me = this;
      me.cerrarmodal();

      axios
        .post("/editarpedidos", {
nomcliente:nomcliente
,telefono:telefono
,direccion:direccion
,fecha:fecha
,nit:nit
,saldo:saldo
,total:total
,cuenta:cuenta
,pago:pago
,idcliente:idcliente,
idpe:idpedido
        })
        .then(function(response) {
          // window.location.href = '/';
          me.lista();
          console.log(response);
            me.$snotify.success("Se ingresaron los datos", "Exito", {
        timeout: 2000,
        showProgressBar: false,
        closeOnClick: false,
        pauseOnHover: true
      });
           
        })
        .catch(function(error) {
          console.log(error);
        });
    }

   ,
    borrar(id,id2) {
      let me = this;
      var url = "/borrarpedido?borrar=" + id+'?borrar1='+id2;
      axios
        .get(url)
        .then(function(response) {
         me.arraydetalle=response.data.detalle;
me.arraypedido=response.data.pedido;

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
    }

  },
  computed: {


     filtracli: function(){

return this.arraycliente.filter((cliente)=>{
        return cliente.nombrecli.match(this.nomcliente);
      });
     },
    filtrar: function () 
    {
      return this.arraypedido.filter((detalle)=>{
        return detalle.nombrecli.match(this.busca);
      });
    },
    totales: function() {
      let me= this;
      var sum=0;
      var sum2=0;
      var item = me.todos;
   for(var todo in item)
   {
  sum+=item[todo].subto;
  sum2+=item[todo].title;
   }

 if (this.nomcliente) {
                  me.errorMostrar='';
            }

this.unidades=(this.newtallas.cantidad-this.newTodoText);

   if((this.newtallas.cantidad-this.newTodoText)<=0 && this.contando<=3){
me.$snotify.warning("Ya no existe más productos en el almacen actualize los productos para la venta", "Precaución", {
        timeout: 5000,
        showProgressBar: false,
        closeOnClick: false,
        pauseOnHover: true
      });
this.contando++;
   }
   this.total=sum;
   this.cantidad=sum2
return sum;
    }  
    ,

  }
  
  ,
  mounted() {
    this.lista();
  }
};
</script>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 8px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 10px;
  text-decoration: none;
  font-size: 12px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>