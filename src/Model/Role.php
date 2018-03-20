<?php
/**
 * Created by PhpStorm.
 * User: jafet
 * Date: 20/03/18
 * Time: 12:21
 */

namespace Kata\Model;

use Assert\Assertion;

class Role
{
    private $name;

    const ROLES =['base','escolta','alero','ala-pivot','pivot'];

    /**
     * Role constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        Assertion::inArray($name,self::ROLES,'Ese Role no es valido');
        $this->name = $name;
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
}
