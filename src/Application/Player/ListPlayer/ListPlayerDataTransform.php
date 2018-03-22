<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 21/03/18
 * Time: 15:34
 */

namespace Kata\Application\Player\ListPlayer;


use Kata\Domain\Model\Player\Player;

class ListPlayerDataTransform
{

    /**
     * @param Player[]|array $players
     * @return array
     */
    public function transform(array $players): array
    {
        $response = [];
        foreach ($players as $player) {
            $response[] = [
                'nombre' => $player->getName(),
                'dorsal' => $player->getDorsal(),
                'rate' => $player->getRate(),
                'role' => $player->getRole()->getName()
            ];
        }

        return $response;
    }
}