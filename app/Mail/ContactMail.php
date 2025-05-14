<?php

namespace App\Mail;

use App\DTOs\ContactDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable{
    use Queueable, SerializesModels;

    public ContactDTO $contact;
    
    public function __construct(ContactDTO $contact){
        $this->contact = $contact;
    }

    public function build(){
        return $this->view('emails.contact')
                    ->with(['contact' => $this->contact])
                    ->subject('New Contact Form Submission')
                    ->replyTo($this->contact->email, $this->contact->name);
    }
}