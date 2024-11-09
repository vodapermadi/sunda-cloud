<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PterodactylController extends Controller
{
    public $apikey = 'ptla_XTZXqPyRLijasOWRN87k5jAXY7sNvKec5G0YQD9SOqx';

    public function index(): View
    {
        try{
            $server = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apikey
            ])->get('https://sundacloud.com/api/application/servers');
    
            if($server->successful()){
                return view('category.pterodactyl.index', [
                    'message' => "success get data",
                    'statusCode' => $server->status(),
                    'server' => $server->json()
                ]);
            }else {
                return view('category.pterodactyl.index', [
                    'message' => "failed get data",
                    'statusCode' => $server->status(),
                ]);
            }

        }catch(Exception $e){
            return view('category.pterodactyl.index', [
                'message' => "connection failed, check your signal again and reload this site",
                'error' => $e,
                'statusCode' => 500,
            ]);
        }
    }

    public function show($id):View
    {
        try{
            $server = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apikey
            ])->get('https://sundacloud.com/api/application/servers/'.$id);
    
            if($server->successful()){
                return view('category.pterodactyl.show', [
                    'message' => "success get data",
                    'statusCode' => $server->status(),
                    'server' => $server->json()
                ]);
            }else {
                return view('category.pterodactyl.show', [
                    'message' => "failed get data",
                    'statusCode' => $server->status(),
                ]);
            }

        }catch(Exception $e){
            return view('category.pterodactyl.index', [
                'message' => "connection failed, check your signal again and reload this site",
                'error' => $e,
                'statusCode' => 500,
            ]);
        }
    }
}
