<?php
namespace Kata\Application\Player\DeletePlayer;

use Assert\Assertion;

class DeletePlayerCommand
{
    private $dorsal;

    /**
     * DeletePlayerCommand constructor.
     * @param $dorsal
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($dorsal)
    {
        Assertion::notBlank($dorsal);
        Assertion::range($dorsal, 1, 20);
        $this->dorsal = $dorsal;
    }

    /**
     * @return mixed
     */
    public function getDorsal()
    {
        return $this->dorsal;
    }
}
