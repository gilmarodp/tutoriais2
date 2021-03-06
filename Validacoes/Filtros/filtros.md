# Filtros
```php
$filter = [
    'trim' => function ($item) { return trim($item); },
    'float' => function ($item) { return (float) $item; },
    'upper' => function ($item) { return strtoupper($item); },
    'email' => function ($item) {
    return filter_var($item, FILTER_SANITIZE_EMAIL); },
    'alpha' => function ($item) {
    return preg_replace('/[^A-Za-z]/', '', $item); },
    'alnum' => function ($item) {
    return preg_replace('/[^0-9A-Za-z ]/', '', $item); },
    'length' => function ($item, $length) {
    return substr($item, 0, $length); },
    'stripTags' => function ($item) { return strip_tags($item); },
];

$validator = [
'email' => [
    'callback' => function ($item) {
    return filter_var($item, FILTER_VALIDATE_EMAIL); },
    'message' => 'Invalid email address'],
'alpha' => [
    'callback' => function ($item) {
    return ctype_alpha(str_replace(' ', '', $item)); },
    'message' => 'Data contains non-alpha characters'],
'alnum' => [
    'callback' => function ($item) {
    return ctype_alnum(str_replace(' ', '', $item)); },
    'message' => 'Data contains characters which are '
    . 'not letters or numbers'],
'digits' => [
    'callback' => function ($item) {
    return preg_match('/[^0-9.]/', $item); },
    'message' => 'Data contains characters which '
    . 'are not numbers'],
'length' => [
    'callback' => function ($item, $length) {
    return strlen($item) <= $length; },
    'message' => 'Item has too many characters'],
'upper' => [
    'callback' => function ($item) {
    return $item == strtoupper($item); },
    'message' => 'Item is not upper case'],
'phone' => [
    'callback' => function ($item) {
    return preg_match('/[^0-9() -+]/', $item); },
    'message' => 'Item is not a valid phone number'],
];

foreach ($data as $field => $item) {
  echo 'Processing: ' . $field . PHP_EOL;
  foreach ($assignments[$field] as $key => $option) {
    if ($validator[$key]['callback']($item, $option)) {
      $message = 'OK';
    } else {
      $message = $validator[$key]['message'];
    }
    printf('%8s : %s' . PHP_EOL, $key, $message);
  }
}

```
