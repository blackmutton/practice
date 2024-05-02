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
<h2>尋找字元(使用while)</h2>

<ul>
    <li>給定一個字串句子</li>
    <li>給定一個單字或字母</li>
    <li>尋找相符的內容</li>
    <li>印出尋找到的單字或字母所在句子中的位置</li>
    <p>人對於訴說追求慾望的文本總是充滿興趣，大概也是因為這樣才會有人著迷於某些歷史的片段，又被《浮士德》所吸引，甚至在視角上總會情不自禁地帶入梅菲斯特的位置。</p>
</ul>
<?php
$str="人對於訴說追求慾望的文本總是充滿興趣，大概也是因為這樣才會有人著迷於某些歷史的片段，又被《浮士德》所吸引，甚至在視角上總會情不自禁地帶入梅菲斯特的位置。";
$target="慾望";
/* 取出部分字串？
計算字串長度 */
$position=0;
// mb_substr只能取指定的位置，而不能跟mb_strpos一樣直接找到
while($target!=mb_substr($str,$position,mb_strlen($target))){
    echo "p=".$position;
    echo ", substr= ".mb_substr($str,$position,mb_strlen($target));
    echo "<br>";
    $position++;
}

echo $target."的位置在".$position;
echo "<br>";
echo mb_strpos($str,$target);

?>
<h2>foreach的用法</h2>
<?php
$score=[
    'judy'=>[
        "國文"=>95,
        "英文"=>64,
        "數學"=>70,
        "地理"=>90,
        "歷史"=>84
    ],
    'amo'=>[
        "國文"=>88,
        "英文"=>78,
        "數學"=>54,
        "地理"=>81,
        "歷史"=>71
    ],
    'john'=>[
        "國文"=>45,
        "英文"=>60,
        "數學"=>68,
        "地理"=>70,
        "歷史"=>62
    ],
    'peter'=>[
        "國文"=>59,
        "英文"=>32,
        "數學"=>77,
        "地理"=>54,
        "歷史"=>42
    ],
    'hebe'=>[
        "國文"=>71,
        "英文"=>62,
        "數學"=>80,
        "地理"=>62,
        "歷史"=>64
    ]
];

foreach($score as $name =>$value) {
        echo "$name 's score are: <br>";
        foreach($value as $subject=>$scores){
            echo "$subject: $scores<br>";
        }
    echo "<br>";
}

?>
<h2>foreach九九乘法法</h2>
<?php
$nine=[];
for ($i=1; $i <=9 ; $i++) { 
    for($j=1;$j<=9;$j++){
         $nine[]="$i x $j = ".($i*$j);
        
    }
}
$count=1;
foreach($nine as $value){
    echo $value;
    echo "&nbsp;";
    if($count%9==0){
        echo "<br>";
    }
    $count++;
}
echo "<br>";
print_r($nine);
?>
</body>
</html>