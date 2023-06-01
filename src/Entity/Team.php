<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Team
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $country;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $moneyBalance;

    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     */
    private $players;

    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    // Getters and setters for the properties

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getMoneyBalance(): ?float
    {
        return $this->moneyBalance;
    }

    public function setMoneyBalance(float $moneyBalance): void
    {
        $this->moneyBalance = $moneyBalance;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function addPlayer(Player $player)
    {
        $this->players->add($player);
        $player->setTeam($this);
    }

    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
        $player->setTeam(null);
    }
}
