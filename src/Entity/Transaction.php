<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departure;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_one_way;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $economy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $big;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $promo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $environment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ticket_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $airline;

    /**
     * @ORM\Column(type="integer")
     */
    private $passenger;

    /**
     * @ORM\Column(type="integer")
     */
    private $senior;

    /**
     * @ORM\Column(type="integer")
     */
    private $adult;

    /**
     * @ORM\Column(type="integer")
     */
    private $student;

    /**
     * @ORM\Column(type="integer")
     */
    private $child;

    /**
     * @ORM\Column(type="integer")
     */
    private $woman;

    /**
     * @ORM\Column(type="integer")
     */
    private $man;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transaction_status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_Installment;

    /**
     * @ORM\Column(type="integer")
     */
    private $dtf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDeparture(): ?\DateTimeInterface
    {
        return $this->departure;
    }

    public function setDeparture(\DateTimeInterface $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getIsOneway(): ?bool
    {
        return $this->is_one_way;
    }

    public function setIsOneway(bool $is_one_way): self
    {
        $this->is_one_way = $is_one_way;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getEconomy(): ?bool
    {
        return $this->economy;
    }

    public function setEconomy(bool $economy): self
    {
        $this->economy = $economy;

        return $this;
    }

    public function getBig(): ?bool
    {
        return $this->big;
    }

    public function setBig(bool $big): self
    {
        $this->big = $big;

        return $this;
    }

    public function getSs(): ?bool
    {
        return $this->ss;
    }

    public function setSs(bool $ss): self
    {
        $this->ss = $ss;

        return $this;
    }

    public function getPromo(): ?string
    {
        return $this->promo;
    }

    public function setPromo(string $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getEnvironment(): ?string
    {
        return $this->environment;
    }

    public function setEnvironment(string $environment): self
    {
        $this->environment = $environment;

        return $this;
    }

    public function getTicketDate(): ?\DateTimeInterface
    {
        return $this->ticket_date;
    }

    public function setTicketDate(\DateTimeInterface $ticket_date): self
    {
        $this->ticket_date = $ticket_date;

        return $this;
    }

    public function getAirline(): ?string
    {
        return $this->airline;
    }

    public function setAirline(string $airline): self
    {
        $this->airline = $airline;

        return $this;
    }

    public function getPassenger(): ?int
    {
        return $this->passenger;
    }

    public function setPassenger(int $passenger): self
    {
        $this->passenger = $passenger;

        return $this;
    }

    public function getSenior(): ?int
    {
        return $this->senior;
    }

    public function setSenior(int $senior): self
    {
        $this->senior = $senior;

        return $this;
    }

    public function getAdult(): ?int
    {
        return $this->adult;
    }

    public function setAdult(int $adult): self
    {
        $this->adult = $adult;

        return $this;
    }

    public function getStudent(): ?int
    {
        return $this->student;
    }

    public function setStudent(int $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getChild(): ?int
    {
        return $this->child;
    }

    public function setChild(int $child): self
    {
        $this->child = $child;

        return $this;
    }

    public function getWoman(): ?int
    {
        return $this->woman;
    }

    public function setWoman(int $woman): self
    {
        $this->woman = $woman;

        return $this;
    }

    public function getMan(): ?int
    {
        return $this->man;
    }

    public function setMan(int $man): self
    {
        $this->man = $man;

        return $this;
    }

    public function getTransactionStatus(): ?string
    {
        return $this->transaction_status;
    }

    public function setTransactionStatus(string $transaction_status): self
    {
        $this->transaction_status = $transaction_status;

        return $this;
    }

    public function getHasInstallment(): ?bool
    {
        return $this->has_Installment;
    }

    public function setHasInstallment(bool $has_Installment): self
    {
        $this->has_Installment = $has_Installment;

        return $this;
    }

    public function getDtf(): ?int
    {
        return $this->dtf;
    }

    public function setDtf(int $dtf): self
    {
        $this->dtf = $dtf;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
