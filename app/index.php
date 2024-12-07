<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

return function ($event) {
  return 'Hello ' . ($event['queryStringParameters']['name'] ?? 'World');
};
