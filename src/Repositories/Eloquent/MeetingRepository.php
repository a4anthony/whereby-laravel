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

    public function getMeeting($meetingId)
    {
        $url = "https://api.whereby.dev/v1/meetings/" . $meetingId;
        return $this->curlApi($url, "get-meeting");
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

        if ($action === "get-meeting") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt(
                $ch,
                CURLOPT_POSTFIELDS,
                '{"fields": ["hostRoomUrl", "viewerRoomUrl"]}'
            );
        }

        $headers = [
            "Authorization: Bearer " . $apiKey,
            "Content-Type: application/json",
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($httpcode === 200 || $httpcode === 201) {
            return json_decode($response);
        }
        if (json_decode($response) && isset(json_decode($response)->error)) {
            $err = json_decode($response)->error;
        } else {
            $err = "An error occurred";
        }
        if ($httpcode === 404) {
            throw new \Exception("Meeting not found: " . $err);
        }
        if ($httpcode === 401) {
            throw new \Exception("Unauthorized");
        }
        if ($httpcode === 400) {
            throw new \Exception("Bad request: " . $err);
        }
        if ($httpcode === 500) {
            throw new \Exception("Internal server error: " . $err);
        }
        throw new \Exception("Unknown error: " . $err);
    }
}
