<?php
namespace Kata\Application\Player\ListPlayer;


use Kata\Domain\Model\Player\PlayerRepository;

class ListPlayer
{
    /**
     * @var PlayerRepository
     */
    private $playerRepository;

    /**
     * @var ListPlayerDataTransform
     */
    private $listPlayerDataTransform;

    /**
     * ListPlayer constructor.
     * @param PlayerRepository $playerRepository
     */
    public function __construct(PlayerRepository $playerRepository, ListPlayerDataTransform $listPlayerDataTransform)
    {
        $this->playerRepository = $playerRepository;
        $this->listPlayerDataTransform = $listPlayerDataTransform;
    }


    public function execute(ListPlayerCommand $listPlayerCommand): array
    {
        return $this->listPlayerDataTransform->transform(
            $this->playerRepository
                ->findAllPlayersOrderedDorsalOrValoration(
                    $listPlayerCommand->getOrderDorsal(),
                    $listPlayerCommand->getOrderValoration()
                )
        );
    }
}
