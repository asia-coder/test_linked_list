<?php

include_once('calc.php');

class UnitTest
{
    public function testExample3()
    {
        $firstList = new NumberList();
        $firstList->addList([9,9,9,9,9,9,9]);

        $secondList = new NumberList();
        $secondList->addList([9,9,9,9]);

        $expected = new NumberList();
        $expected->addList([8, 9, 9, 9, 0, 0, 0, 1]);

        $list = getListSum($firstList, $secondList);

        $r = $this->equalsList($expected, $list);
        $this->assert(true, $r, __METHOD__);
    }

    public function testExample1()
    {
        $firstList = new NumberList();
        $firstList->addList([2, 4, 3]);

        $secondList = new NumberList();
        $secondList->addList([5, 6, 4]);

        $expected = new NumberList();
        $expected->addList([7, 0, 8]);

        $list = getListSum($firstList, $secondList);

        $r = $this->equalsList($expected, $list);
        $this->assert(true, $r, __METHOD__);
    }

    public function testExample2()
    {
        $firstList = new NumberList();
        $firstList->addList([0]);

        $secondList = new NumberList();
        $secondList->addList([0]);

        $expected = new NumberList();
        $expected->addList([0]);

        $list = getListSum($firstList, $secondList);

        $r = $this->equalsList($expected, $list);
        $this->assert(true, $r, __METHOD__);
    }

    protected function equalsList(NumberList $list, NumberList $list2)
    {
        if ($list->getSize() !== $list2->getSize()) return false;

        $node1 = $list->head;
        $node2 = $list2->head;

        while ($node1 !== null) {
            if ($node1->getValue() !== $node2->getValue()) {
                return false;
            }

            $node1 = $node1->getNext();
            $node2 = $node2->getNext();
        }

        return true;
    }

    protected function assert($same, $result, string $test_name)
    {
        if ($same === $result) {
            echo "=== Test - {$test_name}: success ===";
        } else {
            echo "=== Test - {$test_name}: !!! WRONG !!!! ===";
        }

        echo "\n";
    }
}