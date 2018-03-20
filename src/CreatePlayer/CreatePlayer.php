<?php
/**
 * Created by PhpStorm.
 * User: jafet
 * Date: 20/03/18
 * Time: 13:28
 */

namespace Kata\CreatePlayer;

use Kata\Model\Player;
use Kata\Model\Role;
use Kata\Persistence\FileRepository;

class CreatePlayer
{
    private $repo;

    public function __construct(FileRepository $repo)
    {
        $this->repo = $repo;
    }

    public function execute(int $dorsal, string $name, int $rate, string $role)
    {
        if (null !== $this->repo->findByDorsal($dorsal))
        {
            throw new AlredyRegisteredException();
        }
        $roleNewPlayer = new Role($role);
        $player = new Player($dorsal, $name, $rate, $roleNewPlayer);


        $this->repo->add($player);

        return $player;
    }


}