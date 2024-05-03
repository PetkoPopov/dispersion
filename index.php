<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    $globArr = [];
    for ($i = 0; $i < 1000; $i++) {
        $sum = 0;
        for ($e = 0; $e < 25; $e++) {
            $sum += randomSum();
        }
        $globArr[] = $sum;
    }
    ////////////////////////////////
    for ($i = 0; $i < 1000; $i++) {

        $globArr[$i] += 25;
    }

    //////////////////////////////////
    function randomSum() {
        $arr = [1, -1];
        return $arr[rand(0, 1)];
    }

////////////////////////////////////////////
    function view(Array $globArr) {
        echo'<table sryle="border:solid black 2px">';
        for ($e = 0; $e < 200; $e++) {
            echo "<tr>";
            for ($i = 0; $i < 50; $i++) {


                if (array_key_exists($i, $globArr) && $globArr[$i] != 0) {
                    $globArr[$i]--;
                    $color = 'style="background-color:red"';
                    echo "<td $color>";
                } else {
                    $color = 'style="background-color:yellow"';
                    echo "<td $color>";
                }
                echo "</td>";
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
    view($globArr);
    ?>
</body>
</html>
