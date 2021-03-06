<?php

declare(strict_types=1);

namespace App\Module\User\Service;

use RuntimeException;
use Webmozart\Assert\Assert;

/**
 * Class PasswordHasher
 * @package App\Module\User\Service
 */
class PasswordHasher
{
    private int $memoryCost;

    /**
     * PasswordHasher constructor.
     * @param int $memoryCost
     */
    public function __construct(int $memoryCost = PASSWORD_ARGON2_DEFAULT_MEMORY_COST)
    {
        $this->memoryCost = $memoryCost;
    }

    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string
    {
        Assert::notEmpty($password);
        /** @var string|false|null $hash */
        $hash = password_hash($password, PASSWORD_ARGON2I, ['memory_cost' => $this->memoryCost]);
        if ($hash === null) {
            throw new RuntimeException('Invalid hash algorithm.');
        }
        if ($hash === false) {
            throw new RuntimeException('Unable to generate hash.');
        }
        return $hash;
    }
}
