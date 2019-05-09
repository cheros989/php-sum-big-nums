<?php

/*
 * Didn't write comments and explanation. Will answer questions during the interview.
 */

$a = '823094582094385190384102934810293481029348123094818923749817';
$b = '127918723182739182738912731982371984774182389132391929317828234';

/**
 * Adds very big numbers.
 * @param string $a
 * @param string $b
 * @return string
 */
function addNumbersAsStrings(string $a, string $b) {
  if (strlen($a) > strlen($b)) { 
    $t=$a; 
    $a=$b; 
    $b=$t; 
  }
  
  $result = '';
  $carry = 0;

  $aLength = strlen($a);
  $bLength = strlen($b);

  $a = strrev($a);
  $b = strrev($b);

  $diff = $bLength - $aLength;

  for ($i = 0; $i < $bLength; $i++) {
    if (!isset($a[$i])) {
      $currentA = 0;
    } else {
      $currentA = $a[$i];
    }
    
    $tempSum = $currentA + $b[$i] + $carry;
    if ($tempSum > 9) {
      $carry = 1;
      $tempSum = ((string) $tempSum)[1];
    } else {
      $carry = 0;
    }
    $result .= $tempSum;
  }

  if ($carry == 1) {
    $result .= $carry;
  }

  return strrev($result);
}

echo addNumbersAsStrings($a, $b);