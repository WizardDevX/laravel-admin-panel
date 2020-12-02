<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    function getPdf()
    {
        $users = User::all();
        
        $pdf = PDF::loadView('pdf.users', ['users' => $users]);
        
        return $pdf->stream('users.pdf');
    }
}
