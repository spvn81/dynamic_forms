<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function store(Request $request)
    {


       $response = new Response();
       $response->form_id  = $request->form_id;
       $response->data  = json_encode($request->fields);
       $response->save();
       return redirect()->route('responses.show', $response)->with('success', 'Response submitted successfully!');
    }

    public function show(Response $response)
    {
        return view('responses.show', compact('response'));
    }
}
