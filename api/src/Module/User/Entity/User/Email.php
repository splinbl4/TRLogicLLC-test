<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use Webmozart\Assert\Assert;

class Email
{
    private string $value;

    /**
     * Email constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        Assert::email($value);
        $this->value = mb_strtolower($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
