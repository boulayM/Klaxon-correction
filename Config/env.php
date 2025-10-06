
<?php
return [
    'db_host' => $_ENV['DB_HOST'] ?? 'localhost',
    'db_name' => $_ENV['DB_NAME'] ?? 'testKlaxon',
    'db_user' => $_ENV['DB_USER'] ?? 'root',
    'db_pass' => $_ENV['DB_PASS'] ?? 'root',
];
