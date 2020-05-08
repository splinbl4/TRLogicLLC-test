<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use Webmozart\Assert\Assert;

/**
 * Class Token
 * @package App\Module\User\Entity\User
 */
class Token
{
    private ?string $value;

    /**
     * Token constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::uuid($value);
        $this->value = mb_strtolower($value);
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return bool
     */
    private function isEqualTo(string $value): bool
    {
        return $this->value === $value;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->value);
    }
}
