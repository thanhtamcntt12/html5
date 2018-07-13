<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * APIにリクエストします。
     *
     * @param  string $method
     * @param  string $endpoint
     * @param  array $json
     * @return array
     */
    public function api_request($method, $endpoint, $json = [])
    {
        $data = [];
        $client = new Client;
        $timestamp = time();
        $signature = $this->generateSignature($method, $endpoint, $timestamp);

        $data['headers'] = [
            'Accept' => 'application/json',
            'X-CF-API-KEY' => env('X-CF-API-KEY'),
            'X-CF-TIMESTAMP' => $timestamp,
            'X-CF-SIGNATURE' => $signature,
        ];

        if (Session::get('user')) {
            $data['headers']['X-CF-TOKEN'] = Session::get('user')->token;
        }
        if ($json) {
            $data['json'] = $json;
        }
        $data['json']['customer_id'] = Session::get('customer_id');
        $response = [
            'code' => 503,
            'msg' => 'api error'
        ];
        try {
            $response = $client->request($method, env('API_URL') . $endpoint, $data);
        } catch (ClientException $e) {
            dd($e);
            Log::error(Psr7\str($e->getRequest()));
            Log::error(Psr7\str($e->getResponse()));
        }
        return json_decode($response->getBody());
    }

    /**
     * API Signatureを作成します。
     *
     * @param  string $method
     * @param  string $endpoint
     * @param  string $timestamp
     * @return string
     */
    public function generateSignature($method, $endpoint, $timestamp)
    {
        $message = $timestamp . $method . $endpoint;
        return hash_hmac("sha256", $message, env('X-CF-API-SECRET'));
    }

    /**
     * ログイン状態にします。
     *
     * @param  array $user
     */
    public function login_user($user)
    {
        Session::put('user', $user);
    }

    /**
     * ログインユーザーの情報を取得します。
     *
     * @return object
     */
    public function get_user()
    {
        return Session::get('user');
    }

    /**
     * ユーザーをログアウトします。
     */
    public function logout_user()
    {
        Session::flush();
    }

}
