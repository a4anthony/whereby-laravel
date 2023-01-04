<?php

return [
    /**
     * Whereby API Key
     */
    "api_key" => env("WHEREBY_API_KEY"),

    /**
     * Whereby API Version
     */
    "api_version" => env("WHEREBY_API_VERSION", "v1"),

    /**
     * Whereby API Base URL
     */
    "base_uri" => env("WHEREBY_BASE_URI", "https://api.whereby.dev"),

    /**
     * Whereby Webhook Secret
     */
    "webhook_secret" => env("WHEREBY_WEBHOOK_SECRET"),
];
