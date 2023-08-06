<!DOCTYPE html>
<html>

<head>
    <title>PHP 08D</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .kanan{
            text-align: right;
        }
    </style>
</head>

<body>
    <h1>Associative Arrays</h1>
    <?php
        $dict1 = array('a' => 1, 'b' => 2);
        $dict2 = $dict1;
        $dict1['b'] = 4;
        echo "\$dict1['b'] = ", $dict1['b'], "<br>\n";
        echo "\$dict2['b'] = ", $dict2['b'], "<br>\n";

        foreach ($dict1 as $key => $value) {
            echo "<br>dict1 key (", $key, ") => value(", $value, ")";
        }

        $text = 'lorem ipsum elit congue auctor inceptos taciti suscipit tortor auctor integer congue hac nullam hac auctor tellus nullam inceptos nullam integer tellus nullam auctor elit lorem ipsum elit';

        $dict3 = array();
        $array_text = explode(" ", $text);
        foreach ($array_text as $kata) {
            if (!array_key_exists($kata, $dict3))
                $dict3[$kata] = 0;
            $dict3[$kata]++;
        }
        
        arsort($dict3);
        echo "<table>\n";
        echo "<tr>\n<th>Kata</th>\n<th>Jumlah Kemunculan</th>\n</tr>";
        foreach ($dict3 as $key => $value) {
            echo "<tr>\n"
                , "<td>", $key, "</td>\n"
                , "<td class='kanan'>", $value, "</td>\n"
                , "</tr>\n";
        }

        echo "</table>";

    ?>


</body>

</html>