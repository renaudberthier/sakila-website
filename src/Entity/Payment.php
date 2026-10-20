<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 */
#[ORM\Table(name: 'payment')]
#[ORM\Index(name: 'fk_payment_rental', columns: ['rental_id'])]
#[ORM\Index(name: 'idx_fk_customer_id', columns: ['customer_id'])]
#[ORM\Index(name: 'idx_fk_staff_id', columns: ['staff_id'])]
#[ORM\Entity]
class Payment
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'payment_id', type: 'smallint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $paymentId;

    /**
     * @var string
     */
    #[ORM\Column(name: 'amount', type: 'decimal', precision: 5, scale: 2, nullable: false)]
    private $amount;

    /**
     * @var \DateTime
     */
    #[ORM\Column(name: 'payment_date', type: 'datetime', nullable: false)]
    private $paymentDate;

    /**
     * @var \DateTime|null
     */
    #[ORM\Column(name: 'last_update', type: 'datetime', nullable: true, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Rental
     */
    #[ORM\JoinColumn(name: 'rental_id', referencedColumnName: 'rental_id')]
    #[ORM\ManyToOne(targetEntity: \Rental::class)]
    private $rental;

    /**
     * @var \Customer
     */
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'customer_id')]
    #[ORM\ManyToOne(targetEntity: \Customer::class)]
    private $customer;

    /**
     * @var \Staff
     */
    #[ORM\JoinColumn(name: 'staff_id', referencedColumnName: 'staff_id')]
    #[ORM\ManyToOne(targetEntity: \Staff::class)]
    private $staff;

    public function getPaymentId(): ?int
    {
        return $this->paymentId;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(?\DateTimeInterface $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getRental(): ?Rental
    {
        return $this->rental;
    }

    public function setRental(?Rental $rental): self
    {
        $this->rental = $rental;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getStaff(): ?Staff
    {
        return $this->staff;
    }

    public function setStaff(?Staff $staff): self
    {
        $this->staff = $staff;

        return $this;
    }


}
