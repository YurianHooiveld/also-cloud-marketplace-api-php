<?php

namespace Inserve\ALSOCloudMarketplaceAPI\Model;

/**
 *
 */
final class User
{
    protected $parentAccountId = null;
    /**
     * @var int|null
     */
    protected $accountId = null;
    /**
     * @var int|null
     */
    protected $accountState = null;
    /**
     * @var string|null
     */
    protected $firstName = null;
    /**
     * @var string|null
     */
    protected $lastName = null;
    /**
     * @var string|null
     */
    protected $email = null;
    /**
     * @var string|null
     */
    protected $username = null;
    /**
     * @var string|null
     */
    protected $lastLogon = null;
    /**
     * @var string|null
     */


    /**
     * @return int|null
     */
    public function getParentAccountId(): ?int
    {
        return $this->parentAccountId;
    }

    /**
     * @param int|null $parentAccountId
     *
     * @return $this
     */
    public function setParentAccountId(?int $parentAccountId): self
    {
        $this->parentAccountId = $parentAccountId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    /**
     * @param int|null $accountId
     *
     * @return $this
     */
    public function setAccountId(?int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountState(): ?string
    {
        return $this->accountState;
    }

    /**
     * @param string|null $accountState
     *
     * @return $this
     */
    public function setAccountState(?string $accountState): self
    {
        $this->accountState = $accountState;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return $this
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return $this
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return $this
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastLogon(): ?string
    {
        return $this->lastLogon;
    }

    /**
     * @param string|null $lastLogon
     *
     * @return $this
     */
    public function setLastLogon(?string $lastLogon): self
    {
        $this->lastLogon = $lastLogon;

        return $this;
    }
}
