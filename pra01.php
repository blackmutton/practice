<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
    <li>3,5,7,11,13,17……97</li>
</ul>
    <?php
    // 數列為100內的質數
$count=0;
for ($i=3; $i <100 ; $i++) {
    $check =true; 
    // 已經得知1一定可以整除，而其因數一定會在平方根以內，因此可省略
    for ($j=2; $j <= sqrt($i); $j++) { 
        if($i%$j==0){
            $check=false;
        }
        $count++;
    }
    if ($check==true) {
        echo $i.",";
    }
    $count++;
}
echo '迴圈次數:'.$count;
echo '<hr>';
echo '<br>';
?>

</body>
</html>