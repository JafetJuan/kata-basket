<?php
/**
 * Created by PhpStorm.
 * User: jafet
 * Date: 20/03/18
 * Time: 13:07
 */

namespace Kata\Persistence;

use Kata\Model\Player;

class FileRepository
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

    public function add($result): void
    {
        $this->data[] = $result;
        file_put_contents($this->file, serialize($this->data));
    }

    public function getData()
    {
        return $this->data;
    }

    public function findByDorsal(int $dorsal): ?Player
    {
        /**
         * @var Player $player
         */
        foreach ($this->data as $player) {
            if ($player->getDorsal() == $dorsal) {
                return $player;
            }
        }

        return null;
    }
}
