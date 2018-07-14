<?php

namespace Midnite81\Badges\Tests;

class TestClass
{
   // empty class to us in tests

   public function __construct($attributes)
   {

   }

   public static function create($attributes)
   {
        return new static($attributes);
   }
}