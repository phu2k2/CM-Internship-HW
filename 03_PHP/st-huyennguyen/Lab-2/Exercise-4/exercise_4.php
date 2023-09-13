<?php
// Solution 1: preg_match
function matchFormat($regex)
{
    $regexMail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regexUrl = "/^([a-z][a-z0-9+.-]*):(?:\\/\\/((?:(?=((?:[a-z0-9-._~!$&'()*+,;=:]|%[0-9A-F]{2})*))(\\3)@)?(?=(\\[[0-9A-F:.]{2,}\\]|(?:[a-z0-9-._~!$&'()*+,;=]|%[0-9A-F]{2})*))\\5(?::(?=(\\d*))\\6)?)(\\/(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/]|%[0-9A-F]{2})*))\\8)?|(\\/?(?!\\/)(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/]|%[0-9A-F]{2})*))\\10)?)(?:\\?(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/?]|%[0-9A-F]{2})*))\\11)?(?:#(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/?]|%[0-9A-F]{2})*))\\12)?$/i";
    if (empty($regex)) {
        throw new Exception("Empty variable", 400);
    }
    if (gettype($regex) != 'string') {
        throw new Exception("The variable is not of datatype string", 500);
    }
    if (preg_match($regexMail, $regex) || preg_match($regexUrl, $regex)) {
        return true;
    }
    throw new Exception("Variable does not match Email or Url", 422);
}

// Solution 2: filter_var
function matchFormat2($regex)
{
    switch (true) {
        case empty($regex):
            throw new Exception("Empty variable", 400);
            break;
        case gettype($regex) != 'string':
            throw new Exception("The variable is not of datatype string", 500);
            break;
        case (filter_var($regex, FILTER_VALIDATE_EMAIL) || filter_var($regex, FILTER_VALIDATE_URL)):
            return true;
        default:
            throw new Exception("Variable does not match Email or Url", 422);
    }
}

// Test solution 1
try {
    $regex = "https://www.php.net/manual/en/filter.examples.validation.php";
    if (matchFormat($regex)) {
        echo "true";
    }
} catch (\Exception $e) {
    $message = $e->getMessage();
    $code = $e->getCode();
    echo "Error: [Code $code] $message";
}
echo "\n";

// Test solution 2
try {
    $regex = 500;
    if (matchFormat2($regex)) {
        echo "true";
    }
} catch (\Exception $e) {
    $message = $e->getMessage();
    $code = $e->getCode();
    echo "Error: [Code $code] $message";
}
