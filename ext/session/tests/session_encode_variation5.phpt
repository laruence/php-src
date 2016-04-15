--TEST--
Test session_encode() function : variation
--SKIPIF--
<?php include('skipif.inc'); ?>
--FILE--
<?php

ob_start();

/* 
 * Prototype : string session_encode(void)
 * Description : Encodes the current session data as a string
 * Source code : ext/session/session.c 
 */

echo "*** Testing session_encode() : variation ***\n";

var_dump(session_start());

$array = array(1,2,3);
$array["foo"] = &$array;
$array["blah"] = &$array;
$_SESSION["data"] = &$array;
var_dump(session_encode());
var_dump(session_destroy());

echo "Done";
ob_end_flush();
?>
--EXPECTF--
*** Testing session_encode() : variation ***
bool(true)
string(%d) "%s|i:1;data|a:5:{i:0;i:1;i:1;i:2;i:2;i:3;s:3:"foo";R:1;s:4:"blah";R:1;}"
bool(true)
Done
