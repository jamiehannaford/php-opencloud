<?php declare(strict_types=1);

namespace Rackspace\Integration;

use Psr\Log\AbstractLogger;

class DefaultLogger extends AbstractLogger
{
    public function log($level, $message, array $context = [])
    {
        echo $this->format($level, $message, $context);
    }

    private function format($level, $message, $context)
    {
        $msg = strtr($message, $context);

        return sprintf("%s: %s\n", strtoupper($level), $msg);
    }
}