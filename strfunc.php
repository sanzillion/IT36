<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

	$var = "Sandru moses is Awesome";
	$array = ['Sandru','moses','is','Awesome'];
	$len = strlen($var);

 ?>

<h2>Working with String Functions</h2>
<p>String Variable = <?php echo '"'.$var.'"'; ?></p>
 <ul>
 	<li>str_word_count: <?php echo str_word_count($var); ?></li>
 	<li>strtoupper: <?php echo $str = strtoupper($var); ?></li>
 	<li>strtolower: <?php echo $str = strtolower($var); ?></li>
 	<li>ucfirst: <?php echo $str = ucfirst($var); ?></li>
 	<li>lcfirst: <?php echo $str = lcfirst($var); ?></li>
 	<li>ucwords: <?php echo $str = ucwords($var); ?></li>
 	<li>str_replace: <?php echo $str1 = str_replace('Awesome', 'Brilliant', $var); ?></li>
 	<li>str_ireplace: <?php echo $str = str_ireplace('Brilliant', 'Supeeer', $str1); ?></li>
 	<li>substr_replace: <?php echo $str = substr_replace($str, ' Awesome', $len); ?></li>
 	<li>str_split: <?php print_r($arr1[] = str_split($var)); ?></li>
 	<li>explode [to array]: <?php print_r($arr[] = explode(' ', $var)); ?></li>
 	<li>implode [from array]: <?php echo $stremp = implode(", ", $array); ?></li>
 	<li>strcmp: <?php echo $str = strcmp($str1, $str); ?></li>
 	<li>similar_text: <?php echo $str = similar_text($str1, $str); ?></li>
 </ul>
</body>
</html>