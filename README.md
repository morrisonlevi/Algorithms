# Basic Algorithms for PHP

[![Code Climate](https://codeclimate.com/github/morrisonlevi/Algorithm/badges/gpa.svg)](https://codeclimate.com/github/morrisonlevi/Algorithm) [![Test Coverage](https://codeclimate.com/github/morrisonlevi/Algorithm/badges/coverage.svg)](https://codeclimate.com/github/morrisonlevi/Algorithm/coverage)

PHP's built-in functions such as `array_map`, `array_filter` and `array_reduce` have a few issues:

  - They only work with arrays
  - They are eager instead of lazy
  - They are cumbersome to compose

This repository provides definitions for common algorithms such as `map`, `filter`, and `reduce` with certain characteristics:

  - They work with any type that can be used in a foreach loop
  - They are lazy
  - They are not (too) combersome to compose

##Examples

This example does a basic `map`. Note that the function that does the mapping comes first and the input data comes second:
```php
<?php

namespace morrisonlevi\Algorithm;

require __DIR__ . '/load.php';

$mul2 = function ($value) {
    return $value * 2;
};

$result = map($mul2)([1,2,3]);

var_export(iterator_to_array($result));
/*
array (
  0 => 2,
  1 => 4,
  2 => 6,
)
*/
```

This example chains a `filter`, `map` and `sum` together:

```php
<?php

namespace morrisonlevi\Algorithm;

require __DIR__ . '/load.php';

$odd = function($value) {
   return $value % 2 > 0;
};

$mul2 = function($value) {
    return $value * 2;
};

$algorithm = chain(
    filter($odd),
    map($mul2),
    sum()
);

var_dump($algorithm([1,2,3])); // int(8)
```

