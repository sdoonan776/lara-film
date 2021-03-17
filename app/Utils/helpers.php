<?php

function isEmptyString($val){
    if (trim($val) === ''){$val = "NULL";}
    return $val;
}


