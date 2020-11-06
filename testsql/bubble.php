<?php

$numbers=array(4,1,2,0,8,5);

var_dump($numbers);

function bubbleSort(){
  global $numbers;
  $len = sizeof($numbers);
  for($i = 0; $i < $len - 1; $i++){
    for ($j = $i + 1 ; $j < $len ; $j++){
      if($numbers[$i] > $numbers[$j]){
        $temp = $numbers[$i];
        $numbers[$i] = $numbers[$j];
        $numbers[$j] = $temp;
      };
    }
  };
  var_dump($numbers);
};

bubbleSort()
?>
