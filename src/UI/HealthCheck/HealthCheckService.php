<?php

namespace EventNexus\UI\HealthCheck;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

final readonly class HealthCheckService
{
    public function __construct(
        private Connection $connection,
    ) { }

    public function hasDbConnection(): Check
    {
        $errorMessage = null;
        $isSuccess = true;

        try {
            $this->connection->prepare("SELECT NOW()")
                ->executeQuery();
        } catch (Exception $exception) {
            $errorMessage = $exception->getMessage();
            $isSuccess = false;
        }

        return new Check('sql_db_connection', $isSuccess, $errorMessage);
    }
}