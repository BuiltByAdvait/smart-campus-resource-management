<?php
// Copy to connection.php for a local setup. connection.php is intentionally ignored.
// Environment variables take precedence: SMART_CAMPUS_DB_HOST, _USER, _PASSWORD, _NAME, _PORT.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli(
        getenv('SMART_CAMPUS_DB_HOST') ?: '127.0.0.1',
        getenv('SMART_CAMPUS_DB_USER') ?: 'root',
        getenv('SMART_CAMPUS_DB_PASSWORD') ?: '',
        getenv('SMART_CAMPUS_DB_NAME') ?: 'smart_campus_db',
        (int) (getenv('SMART_CAMPUS_DB_PORT') ?: 3306)
    );
    $conn->set_charset('utf8mb4');
} catch (Throwable $e) {
    error_log('Smart Campus database connection failed: ' . $e->getMessage());
    throw new RuntimeException('Database connection is unavailable.');
}
