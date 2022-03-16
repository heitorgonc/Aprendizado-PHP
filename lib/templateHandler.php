<?php

function render(string $fileName, array $params = []){
    extract($params);
    require_once $fileName;
}