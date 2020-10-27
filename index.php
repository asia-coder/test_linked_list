<?php

    include_once('calc.php');

    $firstList = new NumberList();
    $firstList->addList([9,9,9,9,9,9,9]);
    $firstList->printList();

    $secondList = new NumberList();
    $secondList->addList([9,9,9,9]);
    $secondList->printList();


    $list = getListSum($firstList, $secondList);
    $list->printList();