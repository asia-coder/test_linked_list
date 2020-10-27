<?php


class NumberNode
{
    protected $prev;

    protected $next;

    protected $value;

    public function __construct(int $number)
    {
        $this->value = $number;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getPrev(): ?NumberNode
    {
        return $this->prev;
    }

    public function getNext(): ?NumberNode
    {
        return $this->next;
    }

    public function setPrev(NumberNode $prev)
    {
        $this->prev = $prev;
    }

    public function setNext(NumberNode $next)
    {
        $this->next = $next;
    }
}