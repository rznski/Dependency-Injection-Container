<?php

declare(strict_types=1);

namespace App\DependencyInjection;

use App\Exception\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id): object
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            return $entry($this);
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        if (isset($this->entries[$id])) {
            return true;
        }

        return false;
    }

    public function set(string $entry): void
    {
        $this->entries[] = $entry;
    }

    private function resolve(string $id): object
    {
        $reflection = new \ReflectionClass($id);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return $reflection->newInstance();
        }

        $parameters = $constructor->getParameters();

        return $reflection->newInstanceArgs($this->resolveParameters($parameters));
    }

    private function resolveParameters(array $parameters): array
    {
        $dependencies = [];

        foreach ($parameters as $parameter) {

            if ($parameter->getType()->isBuiltin()) {
                throw new ContainerException(
                    'Built in types not available in container. Parameter: ' .
                    $parameter->getType() . ' $' . $parameter->getName()
                );
            }

            $dependencies[] = $this->resolve($parameter->getType()->getName());
        }

        return $dependencies;
    }
}