<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse:collapse;
            /* double樣式至少需要3px */
            border:3px double blue;

        }
        td{
            padding:5px 10px;
            border:1px solid lightgreen;
        }
    </style>
</head>
<body>
    <?php
    $month=5;
    $year=date("Y");
    $firstDay=strtotime(date("$year-$month-1"));
    $firstWeekStartDay=date("w",$firstDay);
    $days=date("t",$firstDay);
    $lastDay=date("$year-$month-$days");
    $bday="1999-04-01";
    ?>
    <table>
        <tr>
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
        </tr>
        <?php
        $date=1;
        for($i=0;$i<6;$i++){
            echo "<tr>";
            for($j=0;$j<7;$j++){
                echo "<td>";
                if($date>$days||($i==0&&$j<$firstWeekStartDay)){
                    echo "&nbsp;";
                }else{
                    echo $date;
                    $date++;
                }
                echo "</td>";
            }
            echo "</tr>";
            if($date>$days){
                break;
            } 
        }
        ?>
    </table>

    <style>
    .block-table{
        display:flex;
        flex-wrap:wrap;
        width:357px;
        
    }
    .item{
        margin-left:-1px;
        margin-top:-1px;
        display:inline-block;
        width:50px;
        height:50px;
        border:1px solid lightgreen;
        /* transition在hover也有是為了讓淡出淡出更自然，若是這邊沒有便會造成滑鼠一移開，效果馬上消失 */
        transition:all .3s;
        background:white;
    }
    .item-header{
    margin-left:-1px;
    margin-top:-1px;
    display:inline-block;
    width:50px;
    height:25px;
    border:1px solid lightgreen;
    text-align: center;
    background-color: darkgreen; 
    color:lightgreen
}
.holiday{
    background-color:red;
}

.item:hover{
    background-color:yellow;
    font-size:26px;
    font-weight:bold;
    color:blue;
    transform:scale(1.3);
    transition:all .3s;
    z-index:10;
}
</style>
    <?php
    $month=date("m");
    $year=date("Y");
    $firstDay=strtotime(date("$year-$month-1"));
    $firstWeekStartDay=date("w",$firstDay);
    $days=date("t",$firstDay);
    $lastDay=strtotime(date("$year-$month-$days"));
    $dates=[];
    for($i=0;$i<42;$i++){
        if($i>=$firstWeekStartDay && $i-$firstWeekStartDay+1 <= $days){
            $diff=$i-$firstWeekStartDay;
            $dates[]=date("Y-m-d",strtotime("$diff days", $firstDay));
        }else{
            $dates[]="&nbsp;";
        }   
        
    }
    echo "<pre>";
    print_r($dates);
    echo "</pre>";
    ?>
    <div class="block-table">
        <div class="item-header">日</div>
        <div class="item-header">一</div>
        <div class="item-header">二</div>
        <div class="item-header">三</div>
        <div class="item-header">四</div>
        <div class="item-header">五</div>
        <div class="item-header">六</div>
        <?php
        foreach($dates as $day){
            if($day!="&nbsp;"){
                $format=explode("-",$day)[2];
                $w=date("w",strtotime($day));
                if($w==0||$w==6){
                    echo "<div class='item holiday'>$format</div>";
                }else{
                    echo "<div class='item date'>$format</div>";
                }
            }else{
                echo "<div class='item'></div>";
            }
        }
        ?>
    </div>
</body>
</html>