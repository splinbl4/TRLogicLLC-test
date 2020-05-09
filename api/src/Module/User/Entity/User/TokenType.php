<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/**
 * Class TokenType
 * @package App\Module\User\Entity\User
 */
class TokenType extends StringType
{
    public const NAME = 'user_user_token';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Token ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new Token((string)$value) : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
