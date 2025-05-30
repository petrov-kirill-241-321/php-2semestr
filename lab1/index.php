<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Петров Кирилл Андреевич 241-321 Lab1</title>
</head>
<body>
    <section class="task1">
        <h3>Задание 1 (СДО)</h3>
        <?php 
            $a_task1 = 27;
            echo "Первый катет равен {$a_task1}<br>";
            $b_task1 = 12;
            echo "Второй катет равен {$b_task1}<br>";

            // Вычисление длины гипотенузы
            $c_task1 = sqrt(($a_task1 ** 2) + ($b_task1 ** 2));
            $c_task1_round = round($c_task1, 2);

            echo "Гипотенуза равна {$c_task1_round}";
        ?>
    </section>

    <section class="task2">
        <h3>Задание 2 (СДО)</h3>
        <?php
            $b_task2 = sqrt($c_task1_round ** 2 - $a_task1 ** 2);
            $b_task2_round = round($b_task2, 2);
            echo "Первый катет равен {$a_task1}<br>";
            echo "Гипотенуза равна {$c_task1_round}<br>";
            echo "Тогда второй катет равен {$b_task2_round}";
        ?>
    </section>

    <section class="task3And4">
        <h3>Задание 3-4 (СДО)</h3>
        <?php
            $c_task3 = 27;
            echo "Гипотенуза равна {$c_task3}<br>";
            $a_task3 = 23;
            echo "Первый катет равен {$a_task3}<br>";

            // Вычисление длины второго катета
            $b_task3 = sqrt($c_task3 ** 2 - $a_task3 ** 2);
            $b_task3_round = round($b_task3, 2);
            echo "Второй катет равен {$b_task3_round}<br>";
            echo "<br>";

            // Вычисление углов в радианах
            $a_angle = asin($a_task3 / $c_task3);  // угол напротив катета a
            $b_angle = asin($b_task3 / $c_task3);  // угол напротив катета b

            // Перевод радиан в градусы и округление
            $a_angle_deg = round(rad2deg($a_angle), 2);
            $b_angle_deg = round(rad2deg($b_angle), 2);
            $c_angle_deg = 90;

            echo "Угол напротив катета a: {$a_angle_deg}°<br>";
            echo "Угол напротив катета b: {$b_angle_deg}°<br>";
            echo "Проверка суммы углов: " . round($a_angle_deg + $b_angle_deg, 2) . "° (должно быть 90°)<br>";
            echo "Угол напротив гипотенузы: {$c_angle_deg}°";
        ?>
    </section>

    <section class="task51">
        <h3>Задание 51 (СДО)</h3>
        <?php
            $sum = 0;        // переменная для суммы
            $count = 0;      // сколько нечётных чисел найдено
            $number = 1;     // начинаем с 1

            while ($count < 20) {
                if ($number % 2 != 0) {
                    $sum += $number;
                    $count++;
                }
                $number++;
            }

            echo "Сумма первых 20 нечетных чисел: $sum";
            ?>
    </section>
</body>
</html>