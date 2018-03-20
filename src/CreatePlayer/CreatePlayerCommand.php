<?php
/**
 * Created by PhpStorm.
 * User: jafet
 * Date: 20/03/18
 * Time: 13:15
 */

namespace Kata\CreatePlayer;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePlayerCommand extends Command
{

    private $createPlayer;

    public function __construct(CreatePlayer $createPlayer)
    {
        $this->createPlayer =$createPlayer;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('insertPlayer')
            ->setDescription('insertar un jugador')
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
        $result = $this->createPlayer->execute(
            $input->getArgument('dorsal'),
            $input->getArgument('name'),
            $input->getArgument('rate'),
            $input->getArgument('role')

        );
        var_dump(json_encode($result->getDorsal(), true));
        /*$output->write('<comment>El jugador ha sido insertado :</comment>');
        $output->writeln("<info>{json_encode($result)}</info>");
*/
    }

}