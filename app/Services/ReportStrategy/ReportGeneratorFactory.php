<?php

namespace App\Services\ReportStrategy;

use ReflectionClass;

class ReportGeneratorFactory
{
    public static function create(string $type): ReportGenerator
    {
        $className = ucfirst($type) . 'ReportGenerator';
        $class = new ReflectionClass("App\\Services\\ReportStrategy\\$className");
        return $class->newInstance();
    }

}
