<?php
namespace Kata\Ejemplo;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IntSumApp extends Command
{
    private $intSum;

    public function __construct(IntSum $intSum)
    {
        $this->intSum = $intSum;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('sum')
            ->setDescription('Sumar dos números')
            ->setHelp('Este comando suma dos números.')
            ->addArgument(
                'dorsal',
                InputArgument::REQUIRED,
                'Operador 1'
            )
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'Operador 2'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $result = $this->intSum->execute(
            $input->getArgument('dorsal'),
            $input->getArgument('name')
        );

        $output->write('<comment>El resultado de la suma es: </comment>');
        $output->writeln("<info>{$result}</info>");

        $output->writeln("<question>Preguntas</question>");
        $output->writeln('<error>Errores</error>');
    }
}