<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
 
$t = new lime_test(6);
 
$t->comment('::slugify()');
$t->is(Stackend::slugify('Sensio'), 'sensio', '::slugify() converts all characters to lower case');
$t->is(Stackend::slugify('sensio labs'), 'sensio-labs', '::slugify() replaces a white space by a -');
$t->is(Stackend::slugify('sensio   labs'), 'sensio-labs', '::slugify() replaces several white spaces by a single -');
$t->is(Stackend::slugify('  sensio'), 'sensio', '::slugify() removes - at the beginning of a string');
$t->is(Stackend::slugify('sensio  '), 'sensio', '::slugify() removes - at the end of a string');
$t->is(Stackend::slugify('paris,france'), 'paris-france', '::slugify() replaces non-ASCII characters by a -');
