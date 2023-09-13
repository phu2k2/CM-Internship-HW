<?php
  function name(int|float|string|array $data, string|null $filter){
    switch(gettype($data)){
        case 'integer':
            $refer = $data;
            break;
        case 'double':
            $refer = round($data,0);
            break;
        case 'string':
            $refer = strlen($data);
            break;
        case 'array':
            if(empty($filter)){
                $refer = count($data);
            }
            else{
                $refer =  count(array_filter($data, function ($item) use ($filter) {
                          return strpos($item,$filter) !== false;
                        }
                    ));
            }
            break;
        default:
            $refer = "Không tồn tại ";
            break;
    }
    return $refer;      
  } 


$data = [23,12,10];
$filter = null;
echo name($data,$filter)."\n";

$data1 = [23,12,10];
$filter1 = 223;
echo name($data1,$filter1)."\n";

$data2 = 5.9;
$filter2 = null;
echo name($data2,$filter2)."\n";

$data3 = "ajsheeird";
$filter3 = null;
echo name($data3,$filter3)."\n";

$data4 = "ajsheeird";
$filter4 = null;
echo name($data4,$filter4)."\n";

$data5 = 10;
$filter5 = 'aksj';
echo name($data5,$filter5)."\n";

$data6 = null;
$filter6 = null;
echo name($data6,$filter6)."\n";


