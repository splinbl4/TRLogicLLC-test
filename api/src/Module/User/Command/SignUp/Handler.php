<?php

declare(strict_types=1);

namespace App\Module\User\Command\SignUp;

use App\Module\User\Entity\User\Email;
use App\Module\User\Entity\User\Id;
use App\Module\User\Entity\User\Name;
use App\Module\User\Entity\User\Token;
use App\Module\User\Entity\User\User;
use App\Module\User\Repository\UserRepositoryInterface;
use App\Module\User\Service\PasswordHasher;
use DateTimeImmutable;
use DomainException;
use Ramsey\Uuid\Uuid;

/**
 * Class Handler
 * @package App\Module\User\Command\SignUp\Request
 */
class Handler
{
    private PasswordHasher $passwordHasher;

    private UserRepositoryInterface $userRepository;

    public function __construct(PasswordHasher $passwordHasher, UserRepositoryInterface $userRepository)
    {
        $this->passwordHasher = $passwordHasher;
        $this->userRepository = $userRepository;
    }

    public function handle(Command $command)
    {
        $email = new Email($command->email);

        if ($this->userRepository->hasByEmail($email)) {
            throw new DomainException('User already exists.');
        }

        $user = new User(
            Id::generate(),
            $email,
            new Name($command->firstName, $command->lastName),
            new DateTimeImmutable(),
            $this->passwordHasher->hash($command->password),
            new Token(Uuid::uuid4()->toString())
        );

        $this->userRepository->add($user);
    }
}
