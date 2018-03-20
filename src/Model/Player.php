<?php
/**
 * Created by PhpStorm.
 * User: jafet
 * Date: 20/03/18
 * Time: 12:11
 */

namespace Kata\Model;


use Assert\Assertion;

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
     *
     * @param $dorsal
     * @param $name
     * @param $rate
     * @param $role
     */
    public function __construct($dorsal, $name, $rate,Role $role)
    {
        Assertion::integer($dorsal,"El dorsal debe ser un numero");
        Assertion::string($name,"El name debe ser un String");
        Assertion::integer($rate,"El rate debe ser un numero");
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
    public function getRole()
    {
        return $this->role;
    }


}
