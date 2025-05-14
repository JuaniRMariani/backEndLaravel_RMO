<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller{

    private $emailService;

    public function __construct(){
        $this->emailService = app('App\Contracts\EmailService');
    }

    public function store(Request $request){
        $this->emailService->sendContactEmail($request);
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

}
