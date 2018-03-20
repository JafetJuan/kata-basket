<?php
namespace Kata\Ejemplo;

class IntSum
{
    private $repo;

    public function __construct(FileRepo $repo)
    {
        $this->repo = $repo;
    }

    public function execute(int $operator1, int $operator2): int
    {
        $result = $operator1 + $operator2;

        $this->repo->add($result);

        return $result;
    }
}