<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Client;
use App\Budget;

class ContactShipped extends Mailable
{
    use Queueable, SerializesModels;


    public $client;

    public $budget;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client, Budget $budget)
    {
        $this->client = $client;

        $this->budget = $budget;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rodrigo@laracast.com')->view('emails.welcome');
    }
}
