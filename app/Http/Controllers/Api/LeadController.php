<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactMail;  
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        
        // Set validation rule
        $validator = Validator::make($data, [
            'name' => 'required|max:250',
            'email' => 'required|max:100',
            'message' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success'=> false,
                'errors' => $validator->errors(),
            ]);
        }

        // Save the lead in the database
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save(); 

        // Send the email to the customer service manager
        Mail::to('customerservice@boolpress.it')->send(new NewContactMail($new_lead));

        return response()->json([
            'success'=> true
        ]);
    }


}
