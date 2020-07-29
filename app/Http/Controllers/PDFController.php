<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {

        $data = ['title' => 'coding driver test title'];

        $pdf = PDF::loadView('generate_pdf', $data)->setPaper('a4', 'landscape');

        Storage::put('public/pdf/invoice.pdf', $pdf->output());
        
        return $pdf->download('invoice.pdf');

        // return $pdf->stream('test_pdf.pdf');

        // return $pdf->download('codingdriver.pdf');
    }
}
