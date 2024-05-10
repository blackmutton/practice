<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@300&family=Freeman&family=Jaro:opsz@6..72&family=Jersey+25+Charted&family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
    <h2 class="poetsen-one-regular">Perpetual calendar</h2>
        <div class="month">
            <form action="" method="get" class="poetsen-one-regular">
            
                <label for="month">Month：</label>
                <input type="number" name="month" id="month" value="<?=date("m");?>" min="1" max="12">
                <input type="submit" value="submit">
            </form>
        </div>
        <?php
            // 設定當年月所在位置
            // $_GET['month']當中的month是與input的name連動，因此若是input未設name，表單便無法吃到資料
                $month=(isset($_GET['month']))?$_GET['month']:date("m");
                $year=(isset($_GET['year']))?$_GET['year']:date("Y");
                
                $firstDay=strtotime(date("$year-$month-1"));
                $firstWeekStartDay=date("w",$firstDay);
                $days=date("t",$firstDay);
                $lastDay=strtotime(date("$year-$month-$days"));
                // 定義特殊節日
                $specialDays = [
                "01" => ["01" => "元旦"],
                "02" => ["07" => "但丁生日"],
                "05" => ["01" => "國際勞動節",
                        "04" => "文藝節"],
                "12" => ["25" => "聖誕節"]
                ];
                // 設立當月日期的陣列
                $dates=[];
                 for($i=0;$i<42;$i++){
                    if($i>=$firstWeekStartDay && $i-$firstWeekStartDay+1<=$days){
                        $diff=$i-$firstWeekStartDay;
                        $dates[]=date("Y-m-d",strtotime("$diff days",$firstDay));
                    }else{
                        $dates[]="&nbsp;";
                    }
                } 
                // 上一個月與下一個月碰到跨年時的邏輯
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
            <!-- 月份連結 -->
            <div class="nav poetsen-one-regular">
                <a href="clendarpra2.php?year=<?=$prev_year;?>&month=<?=$prev;?>">Previous</a>
                <?=$year;?>年<?=$month;?>月
                <a href="clendarpra2.php?year=<?=$next_year;?>&month=<?=$next;?>">Next</a>
            </div>
            
            <!-- 萬年曆本身 -->
        <div class="content">
            
            <div class="flex">
                <div class="item holiday">日</div>
                <div class="item workday">一</div>
                <div class="item workday">二</div>
                <div class="item workday">三</div>
                <div class="item workday">四</div>
                <div class="item workday">五</div>
                <div class="item holiday">六</div>
            </div>
            
    <?php
                
                
                $counter = 0;//計數器開始
                foreach ($dates as $day) {
                    if ($counter % 7 == 0) {
                        echo "<div class='flex'>";
                    }
                    // 先確認$dates[]是否空白
                    if ($day != "&nbsp;") {
                        $isSpecialDay = false;
                        $spMonth = explode("-", $day)[1];
                        $format = explode("-", $day)[2];
                        $w = date("w", strtotime($day));
                        // 將特殊日子列出
                        foreach ($specialDays as $specialMonth => $specialDates) {
                            foreach ($specialDates as $sDate => $name) {
                                if ($format == $sDate && $spMonth == $specialMonth) {
                                    echo "<div class='item special'>$format <br> $name</div>";
                                    $isSpecialDay = true;
                                    break 2; // 如果找到特殊日期，就跳出兩層foreach迴圈
                                }
                            }
                        }
                        // 非特殊節日場合
                        if (!$isSpecialDay) {
                            if ($w == 0 || $w == 6) {
                                echo "<div class='item holiday'>$format</div>";
                            } else {
                                echo "<div class='item workday'>$format</div>";
                            }
                        }
                    // $dates[]空白
                    } else {
                        echo "<div class='item'></div>";
                    }
                    $counter++; // 計數器遞增
                    if ($counter % 7 == 0) {
                        echo "</div>"; // 每七天換一行
                    }
                }       

    ?>
    </div>
    
</body>
</html>