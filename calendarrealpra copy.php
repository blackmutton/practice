<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>萬年曆</h2>
        <div>
            <form action="" method="get">
                <label for="year">Year:</label>
                <input type="number" name="year" id="year" value="<?=date('Y')?>">
                <label for="month">Month:</label>
                <input type="number" name="month" id="year" value="<?=date('m')?>">
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
    <?php
    $month=(isset($_GET['month']))?$_GET['month']:date('m');
    $year=(isset($_GET['year']))?$_GET['year']:date('Y');
    $firstDay=strtotime(date("$year-$month-1"));
    $days=date("t",$firstDay);
    $firstStartDay=date("w",$firstDay);
    $specialDays = [
        "01" => ["01" => "元旦"],
        "02" => ["07" => "但丁生日"],
        "05" => ["01" => "國際勞動節",
                "04" => "文藝節"],
        "12" => ["25" => "聖誕節"]
        ];
    $dates=[];
    for($i=0;$i<42;$i++){
        if($i>=$firstStartDay&&$i-$firstStartDay+1<=$days){
            $diff=$i-$firstStartDay;
            $dates[]=date("Y-m-d",strtotime("$diff days", $firstDay));
        }else{
            $dates[]="&nbsp;"
        }
    }
    if(($month-1)<1){
        $prev=12;
        $prev_year=$year-1;
    }else{
        $prev=$month-1;
        $prev_year=$year;
    }
    if(($month+1)>12){
        $next=1;
        $next_year=$year+1;
    }else{
        $next=$month+1;
        $next_year=$year;
    }
    ?>
    <div>
        <a href="calendarrealpra1.php?year=<?=$prev_year?>&&month=<?=$prev?>">previous</a>
        <?=$year?>年<?=$month?>月
        <a href="calendarrealpra1.php?year=<?=$next_year?>&&month=<?=$next?>">next</a>
    </div>
    <div class="content">
        <div class="flex">
            <div class="item holiday">日</div>
            <div class="item workday">一</div>
            <div class="item workday">二</div>
            <div class="item workday">三</div>
            <div class="item workday">四</div>
            <div class="item workday">五</div>
            <div class="item workday">六</div>
            <?php
            $counter=0;
            foreach($dates as $day){
                if($counter%7==0){
                    echo "<div class='flex'>";
                }
                if($day!="&nbsp;"){
                    $date=explode("-",$day)[2];
                    $w=date("w",strtotime($day));
                    $isspeical=false;
                    $spmonth=explode("-",$day)[1];
                    foreach($specialDays as $specialMonth => $array){
                        foreach($array as $specialDay =>$name){
                            if($date==$specialDay&&$spmonth=$specialMonth){
                                echo "<div class='item special'>$date<br>$name</div>";
                                $isspeical=true;
                                break 2;
                            }
                        }
                        
                    }
                    if(!$isspeical){
                        if($w==0||$w==6){
                            echo "<div class='item holiday'>$day</div>";
                        }else{
                            echo "<div class='item workday'>$day</div>";
                        }
                    }
                }else{
                    echo "<div class='item'></div>";
                }
                $counter++;
                if($counter%7==0){
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>