<?php use_stylesheet('job.css') ?>
<?php use_helper('Text') ?>
 
<div id="job">
  <h1><?php echo $contribution->getCompany() ?></h1>
  <h2><?php echo $contribution->getLocation() ?></h2>
  <h3>
    <?php echo $contribution->getPosition() ?>
    <small> - <?php echo $contribution->getType() ?></small>
  </h3>
 
  <?php if ($contribution->getLogo()): ?>
    <div class="logo">
      <a href="<?php echo $contribution->getUrl() ?>">
        <img src="/uploads/jobs/<?php echo $contribution->getLogo() ?>"
          alt="<?php echo $contribution->getCompany() ?> logo" />
      </a>
    </div>
  <?php endif ?>
 
  <div class="description">
    <?php echo simple_format_text($contribution->getDescription()) ?>
  </div>
 
  <h4>How to apply?</h4>
 
  <p class="how_to_apply"><?php echo $contribution->getHowToApply() ?></p>
 
  <div class="meta">
    <small>posted on <?php echo $contribution->getDateTimeObject('created_at')->format('m/d/Y') ?></small>
  </div>
 
  <div style="padding: 20px 0">
    <a href="<?php echo url_for('contribution/edit?id='.$contribution->getId()) ?>">
      Edit
    </a>
  </div>
</div>




