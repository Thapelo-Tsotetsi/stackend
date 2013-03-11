<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
  <?php include_partial('sfStackendJob/list', array('jobs' => $jobs)) ?>
</div>
