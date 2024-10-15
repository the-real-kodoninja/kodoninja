<?php

$lib1 = ['Introduction',
       'Implementation',
       'Fallback Content',
       'Development Output',
       'Syntax Guidelines',
       'Variables',
       'Functions',
       'Statements',
       'Operators',
       'Event Handling',
       'Objects'];

if($lib == $lib1[0]) {
    $l_view = include_once("Fundamentals/Introduction.php");
} if($lib == $lib1[1]) {
    $l_view = include_once("Fundamentals/Implementation.php");
} if($lib == $lib1[2]) {
    $l_view = include_once("Fundamentals/Fallback-Content.php");
} if($lib == $lib1[3]) {
    $l_view = include_once("Fundamentals/Development-Output.php");
} if($lib == $lib1[4]) {
    $l_view = include_once("Fundamentals/Syntax-Guidelines.php");
} if($lib == $lib1[5]) {
    $l_view = include_once("Fundamentals/Variables.php");
} if($lib == $lib1[6]) {
    $l_view = include_once("Fundamentals/Functions.php");
} if($lib == $lib1[7]) {
    $l_view = include_once("Fundamentals/Statements.php");
} if($lib == $lib1[8]) {
    $l_view = include_once("Fundamentals/Operators.php");
} if($lib == $lib1[9]) {
    $l_view = include_once("Fundamentals/Event-Handling.php");
} if($lib == $lib1[10]) {
    $l_view = include_once("Fundamentals/Objects.php");
}
?>