<?php

namespace EventNexus\UI\HealthCheck;

final readonly class Check
{
    public function __construct(
        public string $name,
        public bool $success,
        public ?string $errorMessage = null,
    ) { }
}