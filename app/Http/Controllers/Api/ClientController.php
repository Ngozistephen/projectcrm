<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController 
{

    public function __construct()
    {
        request()->headers->set('Accept', 'application/json');
    }

   

    public function index()
    {
        $clients = Client::all();
        return ClientResource::collection($clients);
        // return ClientResource::collection(Client::paginate(20));
    }

    public function Show(Client $client)
    {
        return new ClientResource($client);
    }
}
