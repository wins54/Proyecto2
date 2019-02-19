<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $producto=DB::table('producto')->get();
            $talla=DB::table('talla')->get();
            $almacen1=DB::table('almacen')->get();
            $pago=DB::table('pago')->get();
            $almacen = DB::table('almacen')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();

         return [
            'producto'=>$producto,
            'talla'=>$talla,
            'almacen'=>$almacen,
            'pago'=>$pago
                ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          $producto = $request->producto;
            $descripcion = $request->descripcion;
            $precio = $request->precio;
            $descuento = $request->descuento;
            $almacen = $request->almacen;


    DB::table('producto')->insert(['nombrep' => $producto, 'descrip' => $descripcion, 
    'estadop' =>1, 'precio' => $precio, 'descuento' => $descuento]);

    $fb = DB::table('producto')
                ->where('nombrep', 'like', $producto)->first();
                $idD=$fb->idp;
//for ($i = 0; $i < count($request->almacen); $i++) {
  //   DB::table('almacen')->insert(['idp' => $idD, 'cantidad' => 2,'estadoDep'=>1]);
   // }

   foreach ($almacen as $p) {
       //$cant=$p->title;
      // $idta=$p->idtalla;
DB::table('almacen')->insert(['idp' => $idD,'idt' => $p['idtalla'],'cantidad'=>$p['title'],'estadoDep'=>1]);
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
$producto = $request->producto;
$descripcion = $request->descripcion;
$precio = $request->precio;
$descuento = $request->descuento;
$cantidad = $request->cantidad;
$nombreT = $request->nombreT;
$idp = $request->idp;
$tida = $request->tida;

// DB::table('producto')->where('idp', $idp)->update(['nombrep' => $producto, 'descrip' => $descripcion, 
  //  'estadop' =>1, 'precio' => $precio, 'descuento' => $descuento]);

DB::table('producto')->where('idp', $request->idp)->update([ 'nombrep' => $producto,'descrip' => $descripcion,
    'estadop' =>1,'precio' => $precio, 'descuento' => $descuento]);
    
DB::table('almacen')->where('ida', $tida)->update(['cantidad'=>$cantidad,'estadoDep'=>1]);

    }

     public function pagosnuevo(Request $request)
    {
        $pagos = $request->pagos;
        DB::table('pago')->insert(['nombrepago' => $pagos]);
    }

       public function talla(Request $request)
    {
        $tallas = $request->talla;
        DB::table('talla')->insert(['nombreT' => $tallas]);
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
        $borrar = $request->borrar;
         $almacen = DB::table('almacen')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->where('almacen.idp', '=', $borrar)
            ->get();

            return [
            'almacen'=>$almacen,
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
            DB::table('almacen')->where('ida', '=', $borrar)->delete();
    
            $almacen = DB::table('almacen')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();

         return [
            'almacen'=>$almacen,
                ];
    }

     public function destroyt(Request $request)
    {
        $borrar = $request->borrar;

            DB::table('talla')->where('idt', '=', $borrar)->delete();
            $almacen = DB::table('almacen')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();
  $talla=DB::table('talla')->get();

         return [
            'almacen'=>$almacen,
            'talla'=>$talla,
                ];
    }

     public function destroyp(Request $request)
    {
        $borrar = $request->borrar;

            DB::table('pago')->where('idpago', '=', $borrar)->delete();
            $almacen = DB::table('almacen')
            ->join('producto', 'almacen.idp', '=', 'producto.idp')
            ->join('talla', 'almacen.idt', '=', 'talla.idt')
            ->get();
  $pago=DB::table('pago')->get();

         return [
            'almacen'=>$almacen,
            'pago'=>$pago,
                ];
    }
}
