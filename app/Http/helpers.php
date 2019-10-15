<?php



//get request input
function getParam($param)
{
    $paramValue = \Request::get($param);
    return $paramValue;
}


function is_base64($s)
{
    // Check if there are valid base64 characters
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) return false;

    // Decode the string in strict mode and check the results
    $decoded = base64_decode($s, true);
    if (false === $decoded) return false;

    // Encode the string again
    if (base64_encode($decoded) != $s) return false;

    return true;
}


//get current selected language
function currentLocale()
{
    $locale = LaravelLocalization::getCurrentLocale();
    $_SESSION['locale'] = $locale;
    return $locale;
}

//get current language name
function currentLocaleTitle($locale)
{
    $native = '';
    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
        if ($locale == $localeCode) {
            $native = $properties['native'];
        }
    }
    return $native;
}

//array to string
function arrayToString($arr)
{
    $string = '[';
    foreach ($arr as $element) {
        $string .= $element . ',';
    }
    $string = rtrim($string, ", ");
    $string .= ']';
    return $string;
}

//youtube embed url
function youtubeUrl($url)
{
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    return $matches[1];
}


//change 1d array to json
function jsonEncodeArray($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = ['value' => $arr[$i]];
    }
    return $arr;
}

