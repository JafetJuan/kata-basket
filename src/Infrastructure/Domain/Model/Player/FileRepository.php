<?php
namespace Kata\Infrastructure\Domain\Model\Player;

use Kata\Domain\Model\Player\Player;
use Kata\Domain\Model\Player\AlredyRegisteredException;
use Kata\Domain\Model\Player\PlayerRepository;

class FileRepository implements PlayerRepository
{
    private $file;
    private $data;

    public function __construct(string $file)
    {
        if (false === is_writable($file)) {
            throw new \Exception('Unwritable file');
        }
        $data = unserialize(file_get_contents($file));

        $this->file = $file;
        $this->data = empty($data) ? [] : $data;
    }

    public function add(Player $player): void
    {
        $this->data[] = $player;
        $this->save();
    }

    public function existDorsalException(int $dorsal): void
    {
        /**
         * @var Player $player
         */
        foreach ($this->data as $player) {
            if ($player->getDorsal() == $dorsal) {
                throw new AlredyRegisteredException();
            }
        }
    }

    public function findPlayerByDorsalOrNull(int $dorsal): ?Player
    {
        $key = $this->findPlayerByDorsal($dorsal);

        return $key !== null ? $this->data[$key] : null;

    }

    public function deletePlayer(int $dorsal)
    {
        $key = $this->findPlayerByDorsal($dorsal);

        unset($this->data[$key]);
        $this->save();

    }

    private function findPlayerByDorsal(int $dorsal):? int
    {
        foreach ($this->data as $key => $datum) {
            if ($datum->getDorsal() === $dorsal) {
                return $key;
            }
        }

        return null;
    }

    private function save(): void
    {
        file_put_contents($this->file, serialize($this->data));
    }

    public function findAllPlayersOrderedDorsalOrValoration
    (
        bool $orderDorsal,
        bool $orderValoration): array
    {
        return $this->data;
    }
}
