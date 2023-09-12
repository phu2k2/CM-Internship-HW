<?php
// Tạo một bảng (table) với format HTML dựa trên file info.csv
function printTable()
{
    // Read data and convert it to array
    $resource = fopen(__DIR__ . "/info.csv", 'r');
    $str = fread($resource, filesize(__DIR__ . "/info.csv"));
    $lines = array_map(function ($line) {
        return explode(", ", $line);
    }, explode("\n", $str));

    // Create table from the array
    $result = "<table>";
    $result .= "<tr>";
    foreach ($lines[0] as $col) {
        $result .= "<th>$col</th>";
    }
    $result .= "</tr>";
    foreach (array_slice($lines, 1) as $line) {
        $result .= "<tr>";
        foreach ($line as $value) {
            $result .= "<td>$value</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";

    return $result;
}

echo printTable();
