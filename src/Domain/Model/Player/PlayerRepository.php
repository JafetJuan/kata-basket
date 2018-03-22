<?php
namespace Kata\Domain\Model\Player;

interface PlayerRepository
{
    public function add(Player $player): void;
    public function existDorsalException(int $dorsal):void;
    public function findPlayerByDorsalOrNull(int $dorsal):?Player;
    public function deletePlayer(int $dorsal);
    public function findAllPlayersOrderedDorsalOrValoration(bool $orderDorsal, bool $orderValoration): array;
}
