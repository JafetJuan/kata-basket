<?php
namespace Kata\Infrastructure\Command;

use Kata\Application\Player\CreatePlayer\CreatePlayer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Kata\Application\Player\CreatePlayer\CreatePlayerCommand as CreatePlayerCommandApplication;

class CreatePlayerCommand extends Command
{

    private $createPlayer;

    public function __construct(CreatePlayer $createPlayer)
    {
        $this->createPlayer = $createPlayer;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('player:insertPlayer')
            ->setDescription('Insertar un jugador')
            ->setHelp('')
            ->addArgument(
                'dorsal',
                InputArgument::REQUIRED,
                'Dorsal'
            )
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'Nombre'
            )
            ->addArgument(
                'rate',
                InputArgument::REQUIRED,
                'Valoracion'
            )
            ->addArgument(
                'role',
                InputArgument::REQUIRED,
                'Rol del jugador'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        try {

            $result = $this->createPlayer->execute(
                new CreatePlayerCommandApplication(
                    $input->getArgument('dorsal'),
                    $input->getArgument('name'),
                    $input->getArgument('rate'),
                    $input->getArgument('role')
                )
            );

            $output->write('<comment>El jugador ha sido insertado :</comment>');
            $output->writeln("<info>".json_encode($result)."</info>");
        } catch (AlredyRegisteredException $e) {
            $output->writeln("<error>El jugador ya existe'</error>");
        }



    }

}