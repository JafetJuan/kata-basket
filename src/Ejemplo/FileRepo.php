<?php
namespace Kata\Ejemplo;

class FileRepo
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

    public function add(int $result): void
    {
        $this->data[] = $result;
        file_put_contents($this->file, serialize($this->data));
    }
}