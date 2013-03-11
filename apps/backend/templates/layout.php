<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Stackend Admin Interface</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1> <!--
          <a href="<?php echo url_for('homepage') ?>">
            <img src="/images/logo.jpg" alt="Stackend Job Board" />
          </a>
	-->

        </h1>
      </div>
 
		<?php if ($sf_user->isAuthenticated() && $sf_user->isSuperAdmin()): ?>
		  <div id="menu">
			<ul>
			  <li><?php echo link_to('Jobs', 'stackend_job') ?></li>
			  <li><?php echo link_to('Categories', 'stackend_category') ?></li>
			  <li><?php echo link_to('Logout', 'sf_guard_signout') ?></li>
			  <li><?php echo link_to('Users', 'sf_guard_user') ?></li>
			  <li>
  <a href="<?php echo url_for('stackend_affiliate') ?>">
    Affiliates - <strong><?php echo Doctrine_Core::getTable('StackendAffiliate')->countToBeActivated() ?></strong>
  </a>
</li>
			</ul>
		  </div>
		<?php endif ?>

		<?php if ($sf_user->isAuthenticated() && !$sf_user->isSuperAdmin() ): ?>
		  <div id="menu">
			<ul>
			   <li><?php echo link_to('Jobs', 'stackend_job') ?></li>
			 <li><?php echo link_to('Logout', 'sf_guard_signout') ?></li> 


		<!--	<li><a href="/backend.php/job">Jobs</a></li>
			<li><a href="/backend.php/guard/logout">Logout</a></li>
			<li><a href="/backend.php/job/new">Post a Job</a></li>
              -->
			</ul>
		  </div>
		<?php endif ?>
 
      <div id="content">
        <?php echo $sf_content ?>
      </div>
 
      <div id="footer">
        <img src="/images/jobeet-mini.png" />
        powered by <a href="/">
        <img src="/images/symfony.gif" alt="symfony framework" /></a>
      </div>
    </div>
  </body>
</html>
