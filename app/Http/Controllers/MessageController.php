<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use resources\views\Messages;

class MessageController extends Controller
{

    public function index()
    {

        $messages = Message::all();

        return view('messages', compact('messages'));
    }
    public function index2()
    {

        return view('navigation-menu');
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'text' => 'required|max:255',
        'negrita' => 'nullable|boolean',
        'subrayado' => 'nullable|boolean',
        ]);

        Message::create([
            'text' => $request->text,
            'negrita' => $request->has('negrita') ? 1 : 0,
            'subrayado' => $request->has('subrayado') ? 1 : 0,
        ]);

        return redirect()->route('messages')->with('success', 'Mensaje creado con éxito.');

    }

     public function edit($id)
     {
         $message = Message::findOrFail($id);
 
         return view('modificar', compact('message'));
     }
 
     public function update(Request $request, $id)
     {
         $request->validate([
             'text' => 'required|max:255',
             'negrita' => 'nullable|boolean',
             'subrayado' => 'nullable|boolean',
         ]);
 
         $message = Message::findOrFail($id);
 
         $message->update([
             'text' => $request->text,
             'negrita' => $request->has('negrita') ? 1 : 0,
             'subrayado' => $request->has('subrayado') ? 1 : 0,
         ]);
 
         return redirect()->route('messages')->with('success', 'Mensaje actualizado con éxito.');
     }

public function mostrarEliminar() {
    $registro_mensajes = Message::all();
    return view('/eliminar', ['registro_mensajes' => $registro_mensajes]);
}

public function eliminarMensajes(Request $request) {
    $ids = $request -> input('messages');
    if ($ids) {
        Message::destroy($ids);
        return redirect() -> route('eliminar.mensajes') -> with('success', 'Mensaje/s eliminado/s con éxtio');
    }

    return redirect() -> route('eliminar.mensajes') -> with('error', 'No se pudo eliminar los mensajes');
}


}
