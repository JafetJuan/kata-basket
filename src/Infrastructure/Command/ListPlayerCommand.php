<?php
namespace Kata\Infrastructure\Command;

use Kata\Application\Player\ListPlayer\ListPlayer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Kata\Application\Player\ListPlayer\ListPlayerCommand as ListPlayerCommandApplication;

class ListPlayerCommand extends Command
{
    /**
     * @var ListPlayer
     */
    private $listPlayer;

    public function __construct(ListPlayer $listPlayer)
    {
        $this->listPlayer = $listPlayer;
        parent::__construct();
    }

    protected function configure(): void
    {

        $this
            ->setName('player:list')
            ->setDescription('Lista los jugadores')
            ->setHelp('')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $orderDorsal = false;
        $orderValoration = false;

        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('¿Por dorsal del jugador? ', false, '/^(s|j)/i');
        if ($helper->ask($input, $output, $question)) {
            $orderDorsal = true;
        } else {
            $question2 = new ConfirmationQuestion('¿Por valoración media? ', false, '/^(s|j)/i');
            if ($helper->ask($input, $output, $question2)) {
                $orderValoration = true;
            }
        }

        $result = $this->listPlayer->execute(
            new ListPlayerCommandApplication($orderDorsal, $orderValoration)
        );

        $output->write('<comment>Listado jugadores :</comment>');
        $output->writeln("<info>".json_encode($result)."</info>");
    }
}
