<?php

namespace morrisonlevi\Algorithm;


function chain(callable $fn, callable ...$callables) {
    $functions = func_get_args();
    return function(...$params) use($functions) {
        $carry = $functions[0](...$params);
        for ($i = 1; $i < count($functions); $i++) {
            $carry = $functions[$i]($carry);
        }
        return $carry;
    };
}

