<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IotController extends Controller
{
    public function api()
    {
        $apiUrl = 'https://iotjanabadra123.000webhostapp.com/api.php';
        $client = new Client();

        try {
            $response = $client->get($apiUrl);
            $data = $response->getBody()->getContents();
            $dataArray = json_decode($data, true);
            // dd($dataArray);

            return view('bo.page.iot.index', [
                'title' => 'Monitoring Suhu dan Kelembapan',
                'dataArray' => $dataArray['data']['terkini']
            ]);
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
        }
    }
}
