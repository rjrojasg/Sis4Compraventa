<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\reporte;
use Illuminate\Http\Request;



class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('reporte.index');
    }

    public function reporteCompraTotales()
    {
        $compras = Compra::all();


        return view('reporte.reporteCompraTotales', compact('compras'));
    }


    public function reporteCompraMes()
    {
        return view('reporte.reporteCompraMes');
    }

    public function reporteVentaTotales()
    {
        return view('reporte.reporteVentaTotales');
    }

    public function reporteVentaMes()
    {
        return view('reporte.reporteVentaMes');
    }

    public function reporteProdMasVend()
    {
        return view('reporte.reporteProdMasVend');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reporte $reporte)
    {
        //
    }
}
