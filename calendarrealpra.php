 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         table {
             border-collapse: collapse;
             border: 3px double blue;
         }

         td {
             padding: 5px 10px;
             border: 1px solid lightgreen;

         }

         .block-table {
             width: 380px;
             display: flex;
             flex-wrap: wrap;
         }

         .item {
             margin-left: -1px;
             margin-top: -1px;
             display: inline-block;
             width: 50px;
             height: 50px;
             border: 1px solid lightgreen;
             position: relative;
             transition: all 0.3s;
             background: white;
         }

         .item-header {
             margin-left: -1px;
             margin-top: -1px;
             display: inline-block;
             width: 50px;
             height: 25px;
             border: 1px solid lightgreen;
             text-align: center;
             background-color: darkgreen;
             color: lightgreen
         }

         .item:hover {
             background: yellow;
             transform: scale(1.3);
             font-weight: bold;
             color: blue;
             transition: all 0.3s;
             z-index: 10;

         }

         .holiday {
             background: pink;
         }
     </style>
 </head>

 <body>
     <h2>萬年曆</h2>
     <form action="" method="get">
         <label for="month"></label>
         <input type="number" name="month" id="month" value="<?= date("m"); ?>">
         <input type="submit" value="送出">
     </form>
     <?php
        // 檢查表單是否有值
        /* if(isset($_GET['month'])){
        $month=$_GET['month'];
    }else{
        $month=date('m');
    }
    $year=date("Y"); */
        $month = $_GET['month'] ?? date("m");
        $year = (isset($_GET[$year])) ? $_GET['year'] : date("Y");
        echo "年" . $year;
        echo "<br>";
        echo "月份:" . $month;
        echo "<br>";
        $firstDay = strtotime(date("$year-$month-1"));
        $firstWeekStartDay = date("w", $firstDay);
        echo "第一周的開始是第" . $firstWeekDay . "日";
        $date = date("t", $firstDay);

        $days = [];
        for ($i = 0; $i < 42; $i++) {
            if ($i >= $firstWeekStartDay && $i - $firstWeekStartDay + 1 <= $date) {
                $diff = $i - $firstWeekStartDay;
                $days[] = date("Y-m-d", strtotime("$diff days, $firstDay"));
            } else {
                $days[] = "&nbsp;";
            }
        }
        if ($month + 1 > 12) {
            $next = 1;
            $next_year = $year + 1;
        } else {
            $next = $month + 1;
            $next_year = $year;
        }
        if ($month - 1 < 1) {
            $prev = 12;
            $prev_year = $year - 1;
        } else {
            $prev = $month - 1;
            $prev_year = $year;
        }
        ?>
     <div style="width:384px;">
         <a href="calendarrealpra.php?year=<?= $prev_year; ?>&&month=<?= $prev; ?>" style="float:left">上一個月</a>
         <a href="calendarrealpra.php?year=<?= $next_year; ?>&&month=<?= $next; ?>" style="float:right">下一個月</a>
     </div>
     <div style='clear:both'></div>
     <?php

        echo "<div class='block-table'>";
        echo "<div class='item-header'>日</div>";
        echo "<div class='item-header'>一</div>";
        echo "<div class='item-header'>二</div>";
        echo "<div class='item-header'>三</div>";
        echo "<div class='item-header'>四</div>";
        echo "<div class='item-header'>五</div>";
        echo "<div class='item-header'>六</div>";
        foreach ($days as $day) {
            if ($day !== "&nbsp;") {
                $format = explode("-", $day)[2];
                $w = date("w", strtotime($day));
                if ($w == 0 || $w == 6) {
                    echo "<div class='item holiday'>$format</div>";
                } else {
                    echo "<div class='item date'>$format</div>";
                }
            } else {
                echo "<div class='item'></div>";
            }
        }
        echo "</div>";
        ?>
 </body>

 </html>