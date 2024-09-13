<?php

namespace App\Contracts\Services;

interface MessageLimiterContract
{
    public function limit(string $message, int $limit = 64, string $end = '...'): string;
}