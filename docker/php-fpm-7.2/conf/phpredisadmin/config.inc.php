<?php

$config = [
    'servers' => [
        [
            'name' => 'docker', // Optional name.
            'host' => 'redis',
            'port' => 6379,
            'filter' => '*',
            'scheme' => 'tcp', // Optional. Connection scheme. 'tcp' - for TCP connection, 'unix' - for connection by unix domain socket
            'path' => '', // Optional. Path to unix domain socket. Uses only if 'scheme' => 'unix'. Example: '/var/run/redis/redis.sock'
            'flush' => true, // Set to true to enable the flushdb button for this instance.

            // Optional Redis authentication.
            //'auth' => 'redispasswordhere' // Warning: The password is sent in plain-text to the Redis server.
        ],
    ],

    'seperator' => ':',

    // Uncomment to show less information and make phpRedisAdmin fire less commands to the Redis server. Recommended for a really busy Redis server.
    //'faster' => true,

    // Use HTML form/cookie-based auth instead of HTTP Basic/Digest auth
    'cookie_auth' => false,

    // You can ignore settings below this point.

    'maxkeylen' => 100,
    'count_elements_page' => 100,

    // Use the old KEYS command instead of SCAN to fetch all keys.
    'keys' => false,

    // How many entries to fetch using each SCAN command.
    'scansize' => 1000,
];
