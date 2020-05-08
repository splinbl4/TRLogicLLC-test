<?php

declare(strict_types=1);

namespace App\Module\User\Entity\User;

use DateTimeImmutable;

/**
 * Class User
 * @package App\Module\User
 */
class User
{
    private Id $id;

    private Email $email;

    private Name $name;

    private Status $status;

    private DateTimeImmutable $date;

    private string $passwordHash;

    private Token $token;

    /**
     * User constructor.
     * @param Id $id
     * @param Email $email
     * @param Name $name
     * @param $date
     * @param $hash
     * @param Token $token
     */
    public function __construct(
        Id $id,
        Email $email,
        Name $name,
        $date, $hash,
        Token $token
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->date = $date;
        $this->passwordHash = $hash;
        $this->token = $token;
        $this->status = Status::active();
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @return Token
     */
    public function getToken(): Token
    {
        return $this->token;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status->isActive();
    }
}
