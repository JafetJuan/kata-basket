<?php
namespace Kata\Infrastructure\Command;

use Kata\Application\Player\DeletePlayer\DeletePlayer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kata\Application\Player\DeletePlayer\DeletePlayerCommand as DeletePlayerCommandApplication;

class DeletePlayerCommand extends Command
{
    private $deletePlayer;

    public function __construct(DeletePlayer $deletePlayer)
    {
        $this->deletePlayer = $deletePlayer;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('player:delete')
            ->setDescription('Borrar un jugador')
            ->setHelp('')
            ->addArgument(
                'dorsal',
                InputArgument::REQUIRED,
                'Dorsal'
            )

        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $this->deletePlayer->execute(
            new DeletePlayerCommandApplication($input->getArgument('dorsal'))
        );

        $output->writeln("<info>El jugador ha sido eliminado</info>");
    }
}