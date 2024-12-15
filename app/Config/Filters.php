<?php
// app/Config/Filters.php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    /**
     * List of filter aliases that are always available.
     *
     * @var array
     */
    public array $aliases = [
        'csrf'          => \CodeIgniter\Filters\CSRF::class,
        'toolbar'       => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot'      => \CodeIgniter\Filters\Honeypot::class,
        'invalidchars'  => \CodeIgniter\Filters\InvalidChars::class,
        'secureheaders' => \CodeIgniter\Filters\SecureHeaders::class,
        'cors'          => \CodeIgniter\Filters\CORS::class,
        'forcehttps'    => \CodeIgniter\Filters\ForceHTTPS::class,
        'pagecache'     => \CodeIgniter\Filters\PageCache::class,
        'performance'   => \CodeIgniter\Filters\PerformanceMetrics::class,
        'auth'          => \App\Filters\Auth::class,  // Custom filter
    ];

    /**
     * List of filters to be applied globally (before and after the request).
     *
     * @var array
     */
    public array $globals = [
        'before' => [
            // Apply CSRF protection globally before any route
            'csrf',
        ],
        'after' => [
            'toolbar',  // Show the debug toolbar after each request (if needed)
        ],
    ];

    /**
     * List of filters for specific HTTP methods (e.g., 'GET', 'POST', etc.).
     *
     * @var array
     */
    public array $methods = [];

    /**
     * List of filters for specific URI segments.
     *
     * @var array
     */
    public array $filters = [
        // Apply the 'auth' filter to any routes that start with /admin/*
        'auth' => [
            'before' => [
                'admin/*',  // Any route in /admin/* requires authentication
            ],
        ],
    ];
}
