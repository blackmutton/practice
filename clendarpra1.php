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
</body>
</html>