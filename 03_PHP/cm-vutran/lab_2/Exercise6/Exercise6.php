<?php
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
            if (!empty($filter)) {
                return count(array_filter($data, function ($item) use ($filter) {
                    return strpos($item, $filter) !== false;
                }));
            }
            return count($data);
    }
}
echo name("VuTran")."\n";
echo name(["a", "a", "b", "c"], "a")."\n";
echo name(12);
