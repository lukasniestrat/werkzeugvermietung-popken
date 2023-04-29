<?php

declare(strict_types=1);

namespace App\Tests\Utils;

class ReflectionFactory
{
    /**
     * @throws \ReflectionException
     */
    public static function createInstanceOfClass(string $fullQualifiedClassName): object
    {
        return (new \ReflectionClass($fullQualifiedClassName))->newInstanceWithoutConstructor();
    }

    /**
     * @throws \ReflectionException
     */
    public static function setPrivateProperty(object $object, string $property, mixed $value): void
    {
        $refObject = new \ReflectionObject($object);
        $refProperty = self::getPrivatePropertyOfReflectionClass($refObject, $property);
        while (null === $refProperty && $refObject->getParentClass()) {
            $refObject = $refObject->getParentClass();
            $refProperty = self::getPrivatePropertyOfReflectionClass($refObject, $property);
        }
        if (null === $refProperty) {
            throw new \ReflectionException(sprintf('Property %s does not exist', $property));
        }

        $refProperty->setValue($object, $value);
    }

    public static function getPrivateProperty($object, string $property): ?\ReflectionProperty
    {
        $refObject = new \ReflectionObject($object);

        return self::getPrivatePropertyOfReflectionClass($refObject, $property);
    }

    /**
     * @throws \ReflectionException
     */
    public static function callPrivateMethod(object $object, string $methodName, ...$args): mixed
    {
        $refObject = new \ReflectionObject($object);
        $refMethod = $refObject->getMethod($methodName);

        return $refMethod->invoke($object, ...$args);
    }

    private static function getPrivatePropertyOfReflectionClass(\ReflectionClass $object, string $property): ?\ReflectionProperty
    {
        $refProperty = null;
        try {
            $refProperty = $object->getProperty($property);
        } catch (\ReflectionException $e) {
        }

        return $refProperty;
    }
}
