<?php

namespace App\Contracts;

use App\DTOs\ContactDTO;

interface EmailService{
 
    public function sendContactEmail(ContactDTO $contact);

}