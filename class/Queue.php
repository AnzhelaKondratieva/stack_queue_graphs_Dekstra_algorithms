<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.10.2020
 * Time: 21:38
 */

class Queue extends Sequence
{
    /** @var Node */
    private $head;
    /** @var Node */
    private $last;

    public function put(string $item): void
    {
        $node = new Node($item);
        if($this->isEmpty())
        {
            $this->head = $node;
            $this->last = $node;
        } else {
            $this->last->setNext($node);
            $this->last = $node;
        }
    }

    public function get(): ?string
    {
        if($this->isEmpty()) return null;
        $item = $this->head->getItem();
        $this->head = $this->head->getNext();

        return $item;
    }

    protected function getFirst() : ?Node
    {
        return $this->head;
    }

}
