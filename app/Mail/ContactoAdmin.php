<?php

namespace App\Mail;

use App\Entities\Admin\Configuracion;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoAdmin extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Request
     */
    public $request;

    /**
     * Create a new message instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $empresa = Configuracion::where('tipo','web')->where('nombre','titulo')->first()->valor;

        return $this->markdown('emails.contacto-admin')
            ->from('noreply@bsgroup.com.pe')
            ->to(['jorgeochoa@bsgroup.com.pe','consultas@bsgroup.com.pe'])
            ->subject($this->request->nombres.' te envío un mensaje - ' . $empresa);
    }
}