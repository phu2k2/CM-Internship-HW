<?php
function handle($filter, $array)
{
    return count(array_filter($array, function ($item) use ($filter) {
        return strpos($item, $filter) !== false;
    }));
}

function name(int|float|string|array $data, ?string $filter = null): int
{
    $type = gettype($data);
    switch ($type) {
        case 'integer':
            return $data;
        case 'double':
            return (int) $data;
        case 'string':
            return strlen($data);
        case 'array':
            if ($filter) {
                return handle($filter, $data);
            }
            return count($data);
    }
}

echo name("VuTran") . "\n";
echo name(["a", "a", "b", "c"], "a") . "\n";
echo name(12);
