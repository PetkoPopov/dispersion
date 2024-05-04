<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
  
    <?php
    $globArr = [];
    $numBalls=1800;
    $levels = 25 ; 
    for ($i = 0; $i < $numBalls; $i++) {
        $sum = 0;
        for ($e = 0; $e < $levels; $e++) {
            $sum += randomSum();
        }
        $globArr[] = $sum;
    }
    ////////////////////////////////
    for ($i = 0; $i < $numBalls; $i++) {

        $globArr[$i] += $levels;
    }

    //////////////////////////////////
    function randomSum() {
        $arr = [1, -1];
        return $arr[rand(0, 1)];
    }

////////////////////////////////////////////
    function view(Array $globArr , int $numBalls , int $levels) {
        echo'<table>';
        for ($e = 0; $e < $numBalls/5; $e++) {
            echo "<tr>";
            for ($i = $levels*2; $i > 0; $i--) {


                if (array_key_exists($i, $globArr) && $globArr[$i] != 0) {
                    $globArr[$i]--;
                    $color = 'style="background-color:red ; width:5px ; height:5px"';
                    echo "<td $color >";
                } else {
                    $color = 'style="background-color:yellow; width:5px ; height:5px"';
                    echo "<td $color>";
                }
                echo "</td>";
                $i--;
            }
            echo"</tr>";
        }
        echo"</table>";
    }

    function reverseArr(Array $globArr): array|NULL {
        $arr = [];
        foreach ($globArr as $key/* 0-999 */ => $val) {
            if (array_key_exists($val, $arr)) {
                $arr[$val]++;
            } else {
                $arr[$val] = 1;
            }
        }
        return $arr;
    }

    $globArr = reverseArr($globArr);
//    var_dump($globArr);
    view($globArr,$numBalls,$levels);
    ?>
</body>
</html>
