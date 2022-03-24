<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <title>Document</title>
    <style>
        form input {
            font-size: 30px;
        }

        form select {
            font-size: 30px;
        }
    </style>
</head>



<body onload="startTime()">

    <div id="info" style="text-align: center; font-size: 40px;" onload="startTime()">
        <p id="time"></p>
        <?php
        print_r($_POST);
        ?>
    </div>

    <div style="text-align: center; margin: 60px auto; font-size: 36px;">
        <form action="" id="calculator" method="POST">
            <label for="v1" form="calculator">Number 1:</label>
            <input type="number" size="20" name="v1" placeholder="input a number..." value="<?php echo $_POST['v1']; ?>" required>
            <br><br>
            <label for="v2" form="calculator">Number 2:</label>
            <input type="number" size="20" name="v2" placeholder="input a number..." value="<?php echo $_POST['v2']; ?>" required>
            <br><br>
            <label for="operator">Operator:</label>
            <select name="op" id="op" form="calculator" required>
                <option value="<?php empty($_POST['op']) ?  "" : print_r($_POST['op']); ?>" required><?php echo $_POST['op']; ?></option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">%</option>
                <option value="^">^</option>
            </select>
            <br><br>
            <input type="Submit" value="Submit">
        </form>
    </div>

    <div style="text-align: center; font-size: 50px;">

        <?php
        if (count($_POST) !== 3) {
            print_r("Input number !");
        } else {
            $v1 = $_POST['v1'];
            $v2 = $_POST['v2'];
            $op = $_POST['op'];
            switch ($op) {
                case '+':
                    $t = $v1 + $v2;
                    echo $v1 . $op . $v2 . '=' . $t;
                    break;
                case '-':
                    $t = $v1 - $v2;
                    echo $v1 . $op . $v2 . '=' . $t;
                    break;
                case '*':
                    $t = $v1 * $v2;
                    echo $v1 . $op . $v2 . '=' . $t;
                    break;
                case '/':
                    if (!$v2) {
                        echo "Undefined";
                    } else {
                        $t = $v1 / $v2;
                        echo $v1 . $op . $v2 . '=' . $t;
                    }
                    break;
                case '%':
                    if (!$v2) {
                        echo "Undefined";
                    } else {
                        $t = $v1 % $v2;
                        echo $v1 . $op . $v2 . '=' . $t;
                    }
                    break;
                case '^':
                    $t = $v1 ** $v2;
                    echo $v1 . $op . $v2 . '=' . $t;
                    break;
            }
        }
        ?>
    </div>

    <script>
        function startTime() {

            const today = new Date();
            let y = today.getFullYear();
            let M = today.getMonth();
            M++;
            let d = today.getDate();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            M = checkTime(M);
            d = checkTime(d);
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);

            document.getElementById('time').innerHTML = y + "/" + M + "/" + d + " " + h + ":" + m + ":" + s;

            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            };
            return i;
        }
    </script>

</body>

</html>