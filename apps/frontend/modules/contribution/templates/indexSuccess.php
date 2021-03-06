<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
  <?php foreach ($categories as $category_contribution): ?>
    <div class="category_<?php echo Stackend::slugify($category_contribution->getName()) ?>">
      <div class="category">
        <div class="feed">
          <a href="">Feed</a>
        </div>
         <h1>
          <?php echo link_to($category_contribution, 'category_contribution', $category_contribution) ?>
        </h1>
      </div>
 
<?php include_partial('contribution/list', array('jobs' => $category_contribution->getActiveJobs(sfConfig::get('app_max_jobs_on_homepage')))) ?>
      
      <?php if (($count = $category_contribution->countActiveJobs() - sfConfig::get('app_max_jobs_on_homepage')) > 0): ?>
        <div class="more_jobs">
          and <?php echo link_to($count, 'category_contribution', $category_contribution) ?>
          more...
        </div>
      <?php endif; ?>
      
      
    </div>
  <?php endforeach; ?>
</div>
