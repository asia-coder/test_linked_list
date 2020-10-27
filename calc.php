<?php

    include_once('NumberList.php');

    function getListSum(NumberList $first_list, NumberList $second_list)
    {
        $firstList = $first_list->last;
        $secondList = $second_list->last;

        $next_value = 0;
        $resultList = new NumberList();

        while ($firstList !== null || $secondList !== null) {
            $first_val = $firstList ? $firstList->getValue() : 0;
            $second_val = $secondList ? $secondList->getValue() : 0;

            $val = $first_val + $second_val + $next_value;
            $resultList->add($val % 10);
            $next_value = (int) ($val / 10);

            $firstList = $firstList ? $firstList->getPrev() : null;
            $secondList = $secondList ? $secondList->getPrev() : null;
        }

        if ($next_value > 0) {
            $resultList->add($next_value);
        }

        return $resultList;
    }