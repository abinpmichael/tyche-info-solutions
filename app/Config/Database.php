<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * Auto-detected database connection.
     * Switches between local (XAMPP) and live (hosting) credentials automatically.
     *
     * ── LOCAL  → hostname: localhost | db: ci4_tyche   | user: root
     * ── LIVE   → hostname: localhost | db: <live_db>   | user: <live_user>
     *
     * @var array<string, mixed>
     */
    public array $default = [];

    public function __construct()
    {
        parent::__construct();

        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

        $isLocal = ($host === 'localhost' || str_starts_with($host, '127.') || $host === '::1');

        if ($isLocal) {
            // ── LOCAL (XAMPP) ───────────────────────────────────────────────────
            $this->default = [
                'DSN'          => '',
                'hostname'     => 'localhost',
                'username'     => 'root',
                'password'     => '',
                'database'     => 'ci4_tyche',
                'DBDriver'     => 'MySQLi',
                'DBPrefix'     => '',
                'pConnect'     => false,
                'DBDebug'      => true,
                'charset'      => 'utf8mb4',
                'DBCollat'     => 'utf8mb4_general_ci',
                'swapPre'      => '',
                'encrypt'      => false,
                'compress'     => false,
                'strictOn'     => false,
                'failover'     => [],
                'port'         => 3306,
                'numberNative' => false,
                'dateFormat'   => [
                    'date'     => 'Y-m-d',
                    'datetime' => 'Y-m-d H:i:s',
                    'time'     => 'H:i:s',
                ],
            ];
        } else {
            // ── LIVE SERVER (Hosting) ───────────────────────────────────────────
            // ⚠️  Fill in your hosting cPanel database details below:
            $this->default = [
                'DSN'          => '',
                'hostname'     => 'localhost',
                'username'     => 'tycheinfosolutions_cms',
                'password'     => 'TrXExthN5khEQh94eyzu',
                'database'     => 'tycheinfosolutions_cms',
                'DBDriver'     => 'MySQLi',
                'DBPrefix'     => '',
                'pConnect'     => false,
                'DBDebug'      => false,              // hide errors on live
                'charset'      => 'utf8mb4',
                'DBCollat'     => 'utf8mb4_general_ci',
                'swapPre'      => '',
                'encrypt'      => false,
                'compress'     => false,
                'strictOn'     => false,
                'failover'     => [],
                'port'         => 3306,
                'numberNative' => false,
                'dateFormat'   => [
                    'date'     => 'Y-m-d',
                    'datetime' => 'Y-m-d H:i:s',
                    'time'     => 'H:i:s',
                ],
            ];
        }

        // Always use the 'tests' group when running automated tests
        if (defined('ENVIRONMENT') && ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }


    //    /**
    //     * Sample database connection for SQLite3.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'database'    => 'database.db',
    //        'DBDriver'    => 'SQLite3',
    //        'DBPrefix'    => '',
    //        'DBDebug'     => true,
    //        'swapPre'     => '',
    //        'failover'    => [],
    //        'foreignKeys' => true,
    //        'busyTimeout' => 1000,
    //        'dateFormat'  => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    //    /**
    //     * Sample database connection for Postgre.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'DSN'        => '',
    //        'hostname'   => 'localhost',
    //        'username'   => 'root',
    //        'password'   => 'root',
    //        'database'   => 'ci4',
    //        'schema'     => 'public',
    //        'DBDriver'   => 'Postgre',
    //        'DBPrefix'   => '',
    //        'pConnect'   => false,
    //        'DBDebug'    => true,
    //        'charset'    => 'utf8',
    //        'swapPre'    => '',
    //        'failover'   => [],
    //        'port'       => 5432,
    //        'dateFormat' => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    //    /**
    //     * Sample database connection for SQLSRV.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'DSN'        => '',
    //        'hostname'   => 'localhost',
    //        'username'   => 'root',
    //        'password'   => 'root',
    //        'database'   => 'ci4',
    //        'schema'     => 'dbo',
    //        'DBDriver'   => 'SQLSRV',
    //        'DBPrefix'   => '',
    //        'pConnect'   => false,
    //        'DBDebug'    => true,
    //        'charset'    => 'utf8',
    //        'swapPre'    => '',
    //        'encrypt'    => false,
    //        'failover'   => [],
    //        'port'       => 1433,
    //        'dateFormat' => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    //    /**
    //     * Sample database connection for OCI8.
    //     *
    //     * You may need the following environment variables:
    //     *   NLS_LANG                = 'AMERICAN_AMERICA.UTF8'
    //     *   NLS_DATE_FORMAT         = 'YYYY-MM-DD HH24:MI:SS'
    //     *   NLS_TIMESTAMP_FORMAT    = 'YYYY-MM-DD HH24:MI:SS'
    //     *   NLS_TIMESTAMP_TZ_FORMAT = 'YYYY-MM-DD HH24:MI:SS'
    //     *
    //     * @var array<string, mixed>
    //     */
    //    public array $default = [
    //        'DSN'        => 'localhost:1521/XEPDB1',
    //        'username'   => 'root',
    //        'password'   => 'root',
    //        'DBDriver'   => 'OCI8',
    //        'DBPrefix'   => '',
    //        'pConnect'   => false,
    //        'DBDebug'    => true,
    //        'charset'    => 'AL32UTF8',
    //        'swapPre'    => '',
    //        'failover'   => [],
    //        'dateFormat' => [
    //            'date'     => 'Y-m-d',
    //            'datetime' => 'Y-m-d H:i:s',
    //            'time'     => 'H:i:s',
    //        ],
    //    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

}
