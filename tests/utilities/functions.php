<?php
 function create($class, $type = 'create' ,$attributes = [])
 {
    return factory($class)->$type($attributes);
 }