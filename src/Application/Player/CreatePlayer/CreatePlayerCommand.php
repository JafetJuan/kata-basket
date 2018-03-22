<?php
namespace Kata\Application\Player\CreatePlayer;

use Assert\Assertion;
use Kata\Domain\Model\Player\Player;
use Kata\Domain\Model\Role\Role;

class CreatePlayerCommand
{
    private $dorsal;
    private $name;
    private $rate;
    private $role;

    /**
     * CreatePlayerCommand constructor.
     * @param $dorsal
     * @param $name
     * @param $rate
     * @param $role
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($dorsal, $name, $rate, $role)
    {
        Assertion::inArray($role,Role::ROLES,'Ese Role no es valido');
        Assertion::notBlank($dorsal,"El dorsal no debe ser blanco");
        Assertion::string($name,"El name debe ser un String");
        Assertion::notBlank($rate,"El rate no debe ser blanco");
        Assertion::range(
            $rate,
            Player::MIN_RATE,
            Player::MAX_RATE,
            "La puntuación debe ser entre 0 y 100"
        );

        $this->dorsal = $dorsal;
        $this->name = $name;
        $this->rate = $rate;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getDorsal()
    {
        return $this->dorsal;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
}
