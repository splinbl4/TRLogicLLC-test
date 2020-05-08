<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use Webmozart\Assert\Assert;

/**
 * Class Status
 * @package App\Module\User
 */
class Status
{
    public const ACTIVE = 'active';

    private string $name;

    /**
     * Status constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        Assert::oneOf($name, [
            self::ACTIVE,
        ]);
        $this->name = $name;
    }

    /**
     * @return static
     */
    public static function active(): self
    {
        return new self(self::ACTIVE);
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->name === self::ACTIVE;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
