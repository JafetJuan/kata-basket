<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 21/03/18
 * Time: 15:33
 */

namespace Kata\Application\Player\ListPlayer;


use Assert\Assertion;

class ListPlayerCommand
{
    private $orderDorsal;
    private $orderValoration;

    /**
     * ListPlayerCommand constructor.
     * @param $orderDorsal
     * @param $orderValoration
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($orderDorsal, $orderValoration)
    {
        Assertion::boolean($orderDorsal);
        Assertion::boolean($orderValoration);

        $this->orderDorsal = $orderDorsal;
        $this->orderValoration = $orderValoration;
    }

    /**
     * @return mixed
     */
    public function getOrderDorsal()
    {
        return $this->orderDorsal;
    }

    /**
     * @return mixed
     */
    public function getOrderValoration()
    {
        return $this->orderValoration;
    }
}
