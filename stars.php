<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h1>畫星星</h1>
    <h2>直角三角形</h2>
    <?php
    $n=4;
    for($row=1;$row<=$n;$row++){
        for($col=1;$col<=$row;$col++){
            echo "*";
        }
        echo "<br>";
    }
    ?>
    <br>
    <hr>
    <br>

    <h2>長方形</h2>
    <?php
    $n=4;
    for($row=1;$row<=$n;$row++){
        for($col=1;$col<=$n;$col++){
            echo "*";
        }
        echo "<br>";
    }
    ?>
    <br>
    <hr>
    <br>

    <h2>倒直角三角形</h2>
    <?php
    $n=5;
    for($row=1;$row<=$n;$row++){
        // 星號為5,4,3,2,1遞減，規律為$n-$row+1
        for($col=1;$col<=$n-$row+1;$col++){
            echo "*";
        }
        echo "<br>";
    }
    ?>
    <br>
    <hr>
    <br>

    <h2>數字直角三角形</h2>
    <?php
    $n=5;
    for($row=1;$row<=$n;$row++){
        for($col=1;$col<=$row;$col++){
            echo $col;
        }
        echo "<br>";
    }
    ?>
    <br>
    <hr>
    <br>

    <h2>半菱形(右)</h2>
    <?php
    $n=5;
    for($row=1;$row<$n*2;$row++){
        if($row>$n){
            $stars=$n*2-$row;
        }else{
            $stars=$row;
        }
        for($col=1;$col<=$stars;$col++){
            echo "*";
        }
        echo "<br>";
    }
    ?>
    <br>
    <hr>
    <br>

    <h2>半菱形(左)</h2>
    <?php
    $n=5;
    for($row=1;$row<$n*2;$row++){
        if($row>$n){
            $stars=$n*2-$row;
        }else{
            $stars=$row;
        }
        for($space=1;$space<=$n-$stars;$space++){
            echo "&nbsp;";
        }
        for($col=1;$col<=$stars;$col++){
            echo "*";
        }
        echo "<br>";
    } 
    
    ?>
    <br>
    <hr>
    <br>

    <h2>菱形</h2>
    <?php
    $n=5;
    for($row=1;$row<$n*2;$row++){
        if($row>$n){
            $stars=$n*2-$row;
        }else{
            $stars=$row;
        }
        for($space=1;$space<=$n-$stars;$space++){
            echo "&nbsp;";
        }
        for($col=1;$col<=$stars*2-1;$col++){
            echo "*";
        }
        echo "<br>";
    } 
    
    ?>
    <br>
    <hr>
    <br>

    <h2>正三角形</h2>
    <?php
    $n=5;
    for($row=1;$row<=$n;$row++){
        for($space=1;$space<=$n-$row;$space++){
            echo "&nbsp;";
        }
        for($col=1;$col<=$row*2-1;$col++){
            echo "*";
        }
        echo "<br>";
    }
    ?>
    <br>
    <hr>
    <br>

    <h2>正三角形</h2>
    <?php
    
    ?>
    <br>
    <hr>
    <br>
</body>
</html>