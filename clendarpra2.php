<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing:border-box;
            overflow:hidden;
        }
        body {
	    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	    background-size: 400% 400%;
	    height: 100vh;
        margin:auto;
        }


        .container{
            width:1000px;
            /* height:90vh; */
            /* background-color:grey; */
            margin:auto;
            padding-top:20px;
            text-align:center;
        }
        h2{
            margin:auto;
            margin-top:-15px;
            width:75%;
            text-align:center;
            margin-bottom:5px;
        }
        /* 表單月份欄位調整 */
        .month{
            margin:auto;
            width:75%;
            height:20px;
            text-align:center;
            margin-bottom:10px;
        }
        .nav{
            margin:auto;
            width:75%;
            display:flex;
            justify-content:space-around;
            margin-bottom:10px;
        }
        
        .content{
            margin:auto;
            width:75%;
            height:100%;
            border:3px white double;
            background:linear-gradient(rgba(255, 255, 255, 0.5), transparent);
            
        }
        .flex{
            width:100%;
            height:14%;
            /* background-color:lightpink; */
            margin:auto;
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;
            /* border:1px black solid; */
            justify-content:space-around;
            align-items:center;
            padding:15px 0;

        }
        .item{
            width:70px;
            height:70px;
            /* background-color:lightblue; */
            border:1px black dotted;
            
            display:flex;
            align-items:center;
            justify-content:space-around;
            
            border-radius:100%;
            background:linear-gradient(to bottom right, #abe6f5 50%, white 50%);
            transition:.3s;
            font-size:24px;
            box-shadow:2px 4px #068a71;
        }
        .holiday{
            color:red;
            background-color:lightpink;
            border:3px dotted red;
            background:linear-gradient(to bottom right, lightpink 50%, white 50%);
            box-shadow:2px 4px #9c5656;
        }
        .workday{
            color:black;
            border:3px double black;
            background:linear-gradient(to bottom right, lightgreen 50%, white 50%);
            box-shadow:2px 4px green;
        }
        .item:hover{
            transform:scale(1.3);
            z-index:10;
            transition:.3s;
            color:#031085;
            font-size:x-large;
            /* 需要將png轉成ico才能將鼠標更換 */
            cursor: url('./images/marcille.ico'),pointer;
        }
    </style>
</head>
<body>

    <div class="container">
    <h2>萬年曆</h2>
        <div class="month">
            <form action="" method="get">
            
                <label for="month">月份：</label>
                <input type="number" name="month" id="month" value="<?=date("m");?>" min="1" max="12">
                <input type="submit">
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
        <div class="nav">
                <a href="clendarpra2.php?year=<?=$prev_year;?>&month=<?=$prev;?>">上個月</a>
                <?=$year;?>年<?=$month;?>月
                <a href="clendarpra2.php?year=<?=$next_year;?>&month=<?=$next;?>">下個月</a>
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
                $counter = 0; // 計數器初始化
                foreach($dates as $day){
                    if ($counter % 7 == 0) {
                        echo "<div class='flex'>";
                    }
                    echo "<div class='";
                    if($day!="&nbsp;"){
                        $format=explode("-",$day)[2];
                        $w=date("w",strtotime($day));
                        if($w==0||$w==6){
                            echo "item holiday'>$format</div>";
                        }else{
                            echo "item workday'>$format</div>";
                        }
                    } else {
                        echo "item'></div>";
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