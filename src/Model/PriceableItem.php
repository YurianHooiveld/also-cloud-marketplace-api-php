<?php

namespace Inserve\ALSOCloudMarketplaceAPI\Model;

/**
 *
 */
final class PriceableItem
{
    protected $chargeType = null;
    /**
     * @var string|null
     */
    protected $priceableItemDescription = null;
    /**
     * @var string|null
     */
    protected $isUdrcField = null;
    /**
     * @var bool|null
     */
    protected $purchasePrice = null;
    /**
     * @var int|float|null
     */
    protected $salesPrice = null;
    /**
     * @var int|float|null
     */
    protected $suggestedRetailPrice = null;
    /**
     * @var string|null
     */
    protected $currency = null;
    /**
     * @var int|null
     */
    protected $priceableItemId = null;
    /**
     * @var string|null
     */
    protected $materialNumber = null;
    /**
     * @var string|null
     */
    protected $fieldName = null;
    /**
     * @var string|null
     */
    protected $productNumber = null;
    /**
     * @var string|null
     */


    /**
     * @return string|null
     */
    public function getChargeType(): ?string
    {
        return $this->chargeType;
    }

    /**
     * @return string|null
     */
    public function getPriceableItemDescription(): ?string
    {
        return $this->priceableItemDescription;
    }

    /**
     * @return bool|null
     */
    public function getIsUdrcField(): ?bool
    {
        return $this->isUdrcField;
    }

    /**
     * @return int|float|null
     */
    public function getPurchasePrice(): int|float|null
    {
        return $this->purchasePrice;
    }

    /**
     * @return int|float|null
     */
    public function getSalesPrice(): int|float|null
    {
        return $this->salesPrice;
    }

    /**
     * @return int|float|null
     */
    public function getSuggestedRetailPrice(): int|float|null
    {
        return $this->suggestedRetailPrice;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return int|null
     */
    public function getPriceableItemId(): ?int
    {
        return $this->priceableItemId;
    }

    /**
     * @param string|null $chargeType
     *
     * @return $this
     */
    public function setChargeType(?string $chargeType): self
    {
        $this->chargeType = $chargeType;

        return $this;
    }

    /**
     * @param string|null $priceableItemDescription
     *
     * @return $this
     */
    public function setPriceableItemDescription(?string $priceableItemDescription): self
    {
        $this->priceableItemDescription = $priceableItemDescription;

        return $this;
    }

    /**
     * @param bool|null $isUdrcField
     *
     * @return $this
     */
    public function setIsUdrcField(?bool $isUdrcField): self
    {
        $this->isUdrcField = $isUdrcField;

        return $this;
    }

    /**
     * @param int|float|null $purchasePrice
     *
     * @return $this
     */
    public function setPurchasePrice(int|float|null $purchasePrice): self
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * @param int|float|null $salesPrice
     *
     * @return $this
     */
    public function setSalesPrice(int|float|null $salesPrice): self
    {
        $this->salesPrice = $salesPrice;

        return $this;
    }

    /**
     * @param int|float|null $suggestedRetailPrice
     *
     * @return $this
     */
    public function setSuggestedRetailPrice(int|float|null $suggestedRetailPrice): self
    {
        $this->suggestedRetailPrice = $suggestedRetailPrice;

        return $this;
    }

    /**
     * @param string|null $currency
     *
     * @return $this
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param int|null $priceableItemId
     *
     * @return $this
     */
    public function setPriceableItemId(?int $priceableItemId): self
    {
        $this->priceableItemId = $priceableItemId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMaterialNumber(): ?string
    {
        return $this->materialNumber;
    }

    /**
     * @param string|null $materialNumber
     *
     * @return $this
     */
    public function setMaterialNumber(?string $materialNumber): self
    {
        $this->materialNumber = $materialNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * @param string|null $fieldName
     *
     * @return $this
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductNumber(): ?string
    {
        return $this->productNumber;
    }

    /**
     * @param string|null $productNumber
     *
     * @return $this
     */
    public function setProductNumber(?string $productNumber): self
    {
        $this->productNumber = $productNumber;

        return $this;
    }
}
