<?php

include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');
 
$t = new lime_test(1);
$t->comment('->getCompanySlug()');
$job = Doctrine_Core::getTable('StackendJob')->createQuery()->fetchOne();
$t->is($job->getCompanySlug(), Stackend::slugify($job->getCompany()), '->getCompanySlug() return the slug for the company');
