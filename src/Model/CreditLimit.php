<?php

namespace Inserve\ALSOCloudMarketplaceAPI\Model;

/**
 *
 */
final class CreditLimit
{
    protected $comment = null;
    /**
     * @var string|null
     */
    protected $curreny = null;
    /**
     * @var string|null
     */
    protected $date = null;
    /**
     * @var string|null
     */
    protected $limit = null;
    /**
     * @var int|float|null
     */
    protected $remainingCreditLimit = null;
    /**
     * @var int|float|null
     */
    protected $hasCreditLimit = null;
    /**
     * @var bool|null
     */
    protected $createdByAccountId = null;
    /**
     * @var int|null
     */


    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return $this
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurreny(): ?string
    {
        return $this->curreny;
    }

    /**
     * @param string|null $curreny
     *
     * @return $this
     */
    public function setCurreny(?string $curreny): self
    {
        $this->curreny = $curreny;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     *
     * @return $this
     */
    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return float|int|null
     */
    public function getLimit(): float|int|null
    {
        return $this->limit;
    }

    /**
     * @param float|int|null $limit
     *
     * @return $this
     */
    public function setLimit(float|int|null $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return float|int|null
     */
    public function getRemainingCreditLimit(): float|int|null
    {
        return $this->remainingCreditLimit;
    }

    /**
     * @param float|int|null $remainingCreditLimit
     *
     * @return $this
     */
    public function setRemainingCreditLimit(float|int|null $remainingCreditLimit): self
    {
        $this->remainingCreditLimit = $remainingCreditLimit;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasCreditLimit(): ?bool
    {
        return $this->hasCreditLimit;
    }

    /**
     * @param bool|null $hasCreditLimit
     *
     * @return $this
     */
    public function setHasCreditLimit(?bool $hasCreditLimit): self
    {
        $this->hasCreditLimit = $hasCreditLimit;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreatedByAccountId(): ?int
    {
        return $this->createdByAccountId;
    }

    /**
     * @param int|null $createdByAccountId
     *
     * @return $this
     */
    public function setCreatedByAccountId(?int $createdByAccountId): self
    {
        $this->createdByAccountId = $createdByAccountId;

        return $this;
    }
}
