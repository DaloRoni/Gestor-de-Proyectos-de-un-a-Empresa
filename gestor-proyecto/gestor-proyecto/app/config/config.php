<?php
class Config
{
    protected static $data = null;

    protected static function loadEnv()
    {
        if (self::$data !== null) return;
        $root = dirname(__DIR__, 2);
        $envFile = $root . '/.env';
        $data = [];
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '' || str_starts_with($line, '#')) continue;
                if (strpos($line, '=') === false) continue;
                [$key, $val] = explode('=', $line, 2);
                $key = trim($key);
                $val = trim($val);
                $val = trim($val, "\"'");
                $data[$key] = $val;
                putenv("$key=$val");
                $_ENV[$key] = $val;
            }
        }
        self::$data = $data;
    }

    public static function get($key, $default = null)
    {
        self::loadEnv();
        return self::$data[$key] ?? getenv($key) ?: $default;
    }
}

// helper
function env($k, $d = null) { return Config::get($k, $d); }
