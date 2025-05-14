<?php

namespace App\Services;

use App\DTOs\ContactDTO;
use App\Mail\ContactMail;
use App\Contracts\EmailService;

use Illuminate\Support\Facades\Mail;

use Exception;

class EmailServiceImpl implements EmailService{

    public function sendContactEmail(ContactDTO $contact){
        try{
            Mail::to('empleospuertomadryn@gmail.com')->send(new ContactMail($contact));
        } catch (Exception $e){
            throw new Exception('Error sending email: ' . $e->getMessage());
        }
    }
}