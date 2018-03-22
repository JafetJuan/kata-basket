<?php
namespace Kata\Application\Player\CreatePlayer;

use Kata\Domain\Model\Player\Player;

class CreatePlayerDataTransform
{
    public function transform(Player $player): array
    {
        return [
            'nombre' => $player->getName(),
            'dorsal' => $player->getDorsal(),
            'rol' => $player->getRole()->getName(),
            'rate' => $player->getRate()
        ];
    }
}