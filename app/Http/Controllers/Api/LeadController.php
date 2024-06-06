<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MailMessage;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'message' => 'required|max:500',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        } else {
            $newLead = Contact::create($request->all());
            Mail::to('hello@example.com')->send(new MailMessage($newLead));
            return response()->json([
                'success' => true,
                'message' => 'submitted successfully'
            ]);
        }
    }
}
