<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;
use App\Solicitud;
use App\laboratorio;

class PDFController extends Controller
{
    public function PDFUsuarios(){
    	$usuarios = User::all();//PARA CONECTAR CON LOS USUARIOS DE LA BASE DEDATOS POR MEDIO DEL MODELO
    	$pdf = PDF::loadView('usuarios', compact('usuarios'));//IMPORTSNTE IGUAL DEL compact
    	return $pdf->stream('usuarios.pdf');//SE VISUALIZA LE PDF Y LUEGO SE PUEDE DESCARGAR DONDE SEA
    	//return $pdf->download('usuarios.pdf');//DE3SCARGAR EL PEF DIRECTO
    }

    public function PDFSolicitudes(){
    	$solicitudes = Solicitud::all();
    	$pdf = PDF::loadView('solicitudes', compact('solicitudes'))
            ->setPaper('a4', 'landscape');//CAMBIAR LA ORIENTACION DE LA HORA A HORIZONTAL
    	return $pdf->stream('solicitudes.pdf');
    }

    public function PDFLaboratorios(){
        $laboratorios = laboratorio::all();
        $pdf = PDF::loadView('laboratorios', compact('laboratorios'))
            ->setPaper('a4', 'landscape');;
        return $pdf->stream('laboratorios.pdf');
    }
}
