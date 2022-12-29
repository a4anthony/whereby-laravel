<?php

namespace A4Anthony\WherebyLaravel\Repositories\Eloquent;

use A4Anthony\WherebyLaravel\Repositories\MeetingRepositoryInterface;

class MeetingRepository implements MeetingRepositoryInterface
{
    /**
     * @var string
     */
    private $baseUri;

    public function __construct()
    {
        $this->baseUri =
            config("whereby-laravel.base_uri") .
            "/" .
            config("whereby-laravel.api_version");
    }

    public function create($data)
    {
        $url = $this->baseUri . "/meetings";
        return $this->curlApi($url, "create", $data);
    }

    protected function curlApi($url, $action = "", $data = [])
    {
        $apiKey = config("whereby-laravel.api_key");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if ($action === "create") {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $headers = [
            "Authorization: Bearer " . $apiKey,
            "Content-Type: application/json",
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }
}
