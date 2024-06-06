<?php

declare(strict_types=1);

namespace EventNexus\UI\HealthCheck;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HealthCheckController extends AbstractController
{
    public function __construct(
        private readonly HealthCheckService $healthCheckService,
    ) { }

    #[Route('/health-check')]
    public function index(): Response
    {
        $isHealthy = true;
        $checks[] = $this->healthCheckService->hasDbConnection();

        foreach ($checks as $check) {
            if (!$check->success) {
                $isHealthy = false;
            }
        }

        return $this->json(new HealthCheckResponse($isHealthy, $checks));
    }
}
