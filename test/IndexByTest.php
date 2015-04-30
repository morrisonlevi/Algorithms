<?php

namespace morrisonlevi\Algorithm;


class IndexByTest extends \PHPUnit_Framework_TestCase {


    function test_indexBy() {
        $pluck = function($key) {
            return function(array $array) use($key) {
                return $array[$key];
            };
        };

        $input = [
            ['name' => 'Levi', 'id' => 1],
            ['name' => 'Daniel', 'id' => 0],
        ];
        $expect = [
            1 => ['name' => 'Levi', 'id' => 1],
            0 => ['name' => 'Daniel', 'id' => 0],
        ];
        $actual = iterator_to_array(indexBy($pluck('id'))($input));

        $this->assertEquals($expect, $actual);
    }


}