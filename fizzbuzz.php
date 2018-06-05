<?php
function fizzbuzz($number)
{
  if($number % 15 == 0)
    return 'fizzbuzz';
  if($number % 5 == 0)
    return 'buzz';
  if($number % 3 == 0)
    return 'fizz';
  return $number;
} ?>
<html>
<body>
<ol>
<?php for($i = 1; $i < 100; $i++):
  echo '<li>'.fizzbuzz($i).'</li>';
endfor; ?>
</ol>
</body>
</html>
