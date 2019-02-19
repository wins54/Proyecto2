<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $almacen = DB::table('almacen')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();
            
            $cliente=DB::table('cliente')->get();
            
            $detalle=DB::table('detalle')
            ->join('pedido', 'detalle.idpe', '=', 'pedido.idpe')
            ->join('almacen', 'detalle.ida', '=', 'almacen.ida')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();

            $semanas=DB::table('pedido')
            ->join('cliente', 'pedido.idcliente', '=', 'cliente.idcliente')
            ->get();
            
            $pago=DB::table('pago')->get();

            $pedido = DB::table('pedido')
                     ->select(DB::raw('DATEDIFF(now(),fechaCompra) as dias,pedido.idpe,pedido.idcliente,pedido.totalpe,pedido.saldo
                     ,pedido.idpago,pedido.cuenta,pedido.cantidadpro,DATE(pedido.fechaCompra) as fechaCompra,cliente.nombrecli,cliente.direccion,cliente.telefono,cliente.nit'))
                     ->join('cliente', 'pedido.idcliente', '=', 'cliente.idcliente')
                     ->get();


    return [
            'cliente'=>$cliente,
            'detalle'=>$detalle,
            'almacen'=>$almacen,
            'pedido'=>$pedido,
            'pago'=>$pago,
                ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
$nomcliente= $request->nomcliente;
$telefono= $request->telefono;
$direccion= $request->direccion;
$fecha= $request->fecha;
$nit= $request->nit;
$saldo= $request->saldo;
$total= $request->total;
$cuenta= $request->cuenta;
$pago= $request->pago;
$detalle= $request->detalle;
$cantidad=$request->cantidad;
$clienteid=$request->clienteid;


if($clienteid==null){
    
     DB::table('cliente')->insert(['nombrecli' => $nomcliente, 'direccion' => $direccion, 
    'telefono' =>$telefono, 'nit' => $nit]);
    $fb = DB::table('cliente')
                ->where('nombrecli', 'like', $nomcliente)->first();
                $idD=$fb->idcliente;
}
else{
    $idD=$clienteid;
}


 

DB::table('pedido')->insert(['idcliente' => $idD, 'totalpe' => $total, 'saldo' =>$saldo,'idpago' =>$pago,'cuenta' =>$cuenta,
'fechaCompra' =>$fecha,'cantidadpro'=>$cantidad
]);

 $fb1 = DB::table('pedido')
                ->where('totalpe', $total)->first();
                $idP=$fb1->idpe;

foreach ($detalle as $p) {
DB::table('almacen')->where('ida', $p['ida'])->update(['cantidad'=>$p['unidad']]);
DB::table('detalle')->insert(['ida' => $p['ida'],'cantidade' => $p['title'],'idpe'=>$idP,'subtotal'=>$p['subto']]);
}


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $nomcliente= $request->nomcliente;
$telefono= $request->telefono;
$direccion= $request->direccion;
$fecha= $request->fecha;
$nit= $request->nit;
$saldo= $request->saldo;
$total= $request->total;
$cuenta= $request->cuenta;
$pago= $request->pago;
$idcliente= $request->idcliente;
$idpe= $request->idpe;

DB::table('cliente')->where('idcliente', $idcliente)->update(['nombrecli' => $nomcliente, 'direccion' => $direccion, 
    'telefono' =>$telefono, 'nit' => $nit]);

    DB::table('pedido')->where('idpe', $idpe)->update([ 'saldo' =>$saldo,'idpago' =>$pago,'cuenta' =>$cuenta,
'fechaCompra' =>$fecha]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

     public function reportes(Request $request)
    {
         $pedido = DB::table('pedido')
                     ->select(DB::raw('DATEDIFF(now(),fechaCompra) as dias,pedido.idpe,pedido.idcliente,pedido.totalpe,pedido.saldo
                     ,pedido.idpago,pedido.cuenta,pedido.cantidadpro,DATE(pedido.fechaCompra) as fechaCompra,cliente.nombrecli,cliente.direccion,cliente.telefono,cliente.nit'))
                     ->join('cliente', 'pedido.idcliente', '=', 'cliente.idcliente')
                     ->having('dias', '>', 30)
                     //->having('pedido.saldo', '<','pedido.totalpe' )
                     ->get();
        
$pedido2 = DB::table('detalle')
                ->select('almacen.ida', DB::raw('SUM(cantidade) as cantidad, SUM(subtotal) as total, CONCAT(producto.nombrep," ",talla.nombreT) as producto'))
                ->join('pedido', 'detalle.idpe', '=', 'pedido.idpe')
                ->join('almacen', 'detalle.ida', '=', 'almacen.ida')
                  ->join('producto', 'almacen.idp', '=', 'producto.idp')
                 ->join('talla', 'almacen.idt', '=', 'talla.idt')
                ->groupBy('almacen.ida')
                 ->orderBy('cantidad', 'desc')
                ->get();

                 $pedido22 = DB::table('pedido')
                     ->select(DB::raw('DATEDIFF(now(),fechaCompra) as dias,pedido.idpe,pedido.idcliente,pedido.totalpe,pedido.saldo
                     ,pedido.idpago,pedido.cuenta,pedido.cantidadpro,DATE(pedido.fechaCompra) as fechaCompra,cliente.nombrecli,cliente.direccion,cliente.telefono,cliente.nit'))
                     ->join('cliente', 'pedido.idcliente', '=', 'cliente.idcliente')
                     ->having('dias', '>', 30)
                     ->get();

                      return [
            'pedido'=>$pedido,
        'pedido2'=>$pedido2,


                ];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $borrar = $request->borrar;
        $borrar1 = $request->borrar1;

         DB::table('detalle')->where('idpe', '=', $borrar)->delete();
         DB::table('pedido')->where('idpe', '=', $borrar)->delete();
        DB::table('cliente')->where('idcliente', '=', $borrar1)->delete();

        $pedido = DB::table('pedido')
                     ->select(DB::raw('DATEDIFF(now(),fechaCompra) as dias,pedido.idpe,pedido.idcliente,pedido.totalpe,pedido.saldo
                     ,pedido.idpago,pedido.cuenta,pedido.cantidadpro,DATE(pedido.fechaCompra) as fechaCompra,cliente.nombrecli,cliente.direccion,cliente.telefono,cliente.nit'))
                     ->join('cliente', 'pedido.idcliente', '=', 'cliente.idcliente')
                     ->get();
               
            $cliente=DB::table('cliente')->get();
            

            $detalle=DB::table('detalle')
            ->join('pedido', 'detalle.idpe', '=', 'pedido.idpe')
            ->join('almacen', 'detalle.ida', '=', 'almacen.ida')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();

             return [
            'cliente'=>$cliente,
            'detalle'=>$detalle,
            'pedido'=>$pedido,
                ];
        
    }
}
