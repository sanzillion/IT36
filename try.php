<?php

$str = "Hello fri3211nd, you're
       looking          good today!";

print_r(str_word_count($str, 1, '0..3'));
print_r(str_word_count($str, 2, '0..3'));
print_r(str_word_count($str, 1, 'àáãç3'));

echo str_word_count($str);

?>
