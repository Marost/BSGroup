<?php namespace App\Mail;

use App\Entities\Admin\Configuracion;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoEnviarAdministrador extends Mailable
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
        $email = Configuracion::where('tipo','contacto')->where('nombre','email')->first()->valor;
        $emails = explode(',', $email);

        return $this->markdown('emails.contacto-admin')
                    ->from($this->request->email)
                    ->to($emails)
                    ->subject($this->request->nombres.' te envío un mensaje');
    }
}
