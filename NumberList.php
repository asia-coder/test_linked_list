<?php

include_once('NumberNode.php');

class NumberList
{
    /**
     * @var NumberNode
     */
    public $head;

    /**
     * @var NumberNode
     */
    public $last;

    protected $size = 0;

    public function add(int $number)
    {
        if (!is_int($number)) {
            throw new Exception('Передайте только целые числа');
        }

        if ($number < 0 || $number > 9) {
            throw new Exception('Диапозон цифр от 0 до 9');
        }

        if ($this->checkNodesSize()) {
            throw new Exception('Макс. кол-во node не должен превышать 100');
        }

        $node = new NumberNode($number);

        if (is_null($this->head)) {
            $this->head = $node;
            $this->last = $this->head;
        } else {
            $this->last->setNext($node);
            $node->setPrev($this->last);
            $this->last = $node;
        }

        $this->size++;
    }

    protected function checkNodesSize()
    {
        return $this->size > 100;
    }

    public function addList(array $number_list)
    {
        if (count($number_list) > 100) {
            throw new Exception('Макс. кол-во node не должен превышать 100');
        }

        foreach ($number_list as $number) {
            $this->add($number);
        }
    }

    public function printList()
    {
        $node = $this->head;

        while (!is_null($node)) {
            echo "{$node->getValue()} ";
            $node = $node->getNext();
        }

        echo "\n";
    }

    public function getSize()
    {
        return $this->size;
    }
}