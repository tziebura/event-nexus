<?php

namespace EventNexus\UI\HealthCheck;

use DateTimeImmutable;

final readonly class HealthCheckResponse
{
    public DateTimeImmutable $checkedAt;

    public function __construct(
        public bool $isHealthy,
        public array $checks,
    ) {
        $this->checkedAt = new DateTimeImmutable();
    }
}