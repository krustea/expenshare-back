<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Debt
 *
 * @ORM\Table(name="debt", indexes={@ORM\Index(name="fk_debt_person2_idx", columns={"to_id"}), @ORM\Index(name="fk_debt_person1_idx", columns={"from_id"})})
 * @ORM\Entity
 */
class Debt
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * @return PersonList
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param PersonList $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return PersonList
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param PersonList $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $amount;

    /**
     * @var bool
     *
     * @ORM\Column(name="paid", type="boolean", nullable=false)
     */
    private $paid = '0';

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="from_id", referencedColumnName="id")
     * })
     */
    private $from;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="to_id", referencedColumnName="id")
     * })
     */
    private $to;


}
