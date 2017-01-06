<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservacionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellidos;
    public $telefono;
    public $email;
    public $fecha_llegada;
    public $fecha_salida;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->nombre = $datos['nombre'];
        $this->apellidos = $datos['apellidos'];
        $this->telefono = $datos['telefono'];
        $this->email = $datos['email'];
        $this->fecha_llegada = $datos['fecha_llegada'];
        $this->fecha_salida = $datos['fecha_salida'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reservacion_cliente');
    }
}
