<?php
namespace Dsheiko\Validate;

class IsBool extends ValidateAbstract implements ValidateInterface
{
    /**
     * Main validation method
     *
     * @inheritDoc
     */
    public static function test($value): bool
    {
        return \is_bool($value);
    }
}
