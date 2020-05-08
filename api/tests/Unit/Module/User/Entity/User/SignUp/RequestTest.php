<?php

declare(strict_types=1);

namespace Test\Unit\Module\User\Entity\User\SignUp;

use App\Module\User\Entity\User\Email;
use App\Module\User\Entity\User\Id;
use App\Module\User\Entity\User\Name;
use App\Module\User\Entity\User\Token;
use App\Module\User\Entity\User\User;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class RequestTest extends TestCase
{
    public function testSuccess(): void
    {
        $user = new User(
            $id = Id::generate(),
            $email = new Email('mail@example.com'),
            $name = new Name('First', 'Last'),
            $date = new DateTimeImmutable(),
            $hash = 'hash',
            $token = new Token(Uuid::uuid4()->toString())
        );

        self::assertTrue($user->isActive());

        self::assertEquals($id, $user->getId());
        self::assertEquals($date, $user->getDate());
        self::assertEquals($name, $user->getName());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());
        self::assertEquals($token, $user->getToken());
    }
}
