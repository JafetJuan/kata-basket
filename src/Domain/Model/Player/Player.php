<?php
namespace Kata\Domain\Model\Player;

use Assert\Assertion;
use Kata\Domain\Model\Role\Role;

class Player
{
    const MIN_RATE = 0;
    const MAX_RATE = 100;

    private $dorsal;
    private $name;
    private $rate;
    private $role;

    /**
     * Player constructor.
     * @param $dorsal
     * @param $name
     * @param $rate
     * @param Role $role
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($dorsal, $name, $rate,Role $role)
    {
        Assertion::notBlank($dorsal,"El dorsal no debe ser blanco");
        Assertion::string($name,"El name debe ser un String");
        Assertion::notBlank($rate,"El rate no debe ser blanco");
        Assertion::range($rate, self::MIN_RATE, self::MAX_RATE, "La puntuación debe ser entre 0 y 100");
        $this->dorsal = $dorsal;
        $this->name = $name;
        $this->rate = $rate;
        $this->role = $role;

    }

    /**
     * Get Dorsal
     *
     * @return mixed
     */
    public function getDorsal()
    {
        return $this->dorsal;
    }

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get Rate
     *
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Get Role
     *
     * @return mixed
     */
    public function getRole(): Role
    {
        return $this->role;
    }


}
