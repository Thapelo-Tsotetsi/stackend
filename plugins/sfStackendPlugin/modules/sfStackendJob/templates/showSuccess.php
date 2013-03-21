<?php use_stylesheet('job.css') ?>
<?php use_helper('Text') ?>

<?php slot('title') ?>
  <?php echo sprintf('%s is looking for a %s', $job->getCompany(), $job->getPosition()) ?>
<?php end_slot() ?>


<?php if ($sf_request->getParameter('token') == $job->getToken()): ?>
  <?php include_partial('sfStackendJob/admin', array('job' => $job)) ?>
<?php endif ?>
 
<div id="job">
  <h1><?php echo $job->getCompany() ?></h1>
  <h2><?php echo $job->getLocation() ?></h2>
  <h3>
    <?php echo $job->getPosition() ?>
    <small> - <?php echo $job->getType() ?></small>
  </h3>




  <?php if ($job->getLogo()): ?>
    <div class="logo">
      <a href="<?php echo $job->getUrl() ?>">
<img src="/uploads/jobs/<?php echo $job->getLogo() ?>" alt="<?php echo $job->getCompany() ?> logo" />
      </a>
    </div>
  <?php endif ?>
 
  <div class="description">
    <?php echo simple_format_text($job->getDescription()) ?>
  </div>
 
  <div class= "meta_social_networks">
	<?php 
	$test = url_for('job_show_user', $job);
	//echo $test;
	echo "<div class='fb-send' style='vertical-align:top' data-href='http://www.stackend.com$test'>

</div>";
?>
<a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
</div>

  <h4>How to apply?</h4>



 
  <p class="how_to_apply"><?php echo $job->getHowToApply() ?></p>
 
    <div style="padding: 20px 10px">
		<?php echo auto_link_text($job->getUrl())?>

  </div>


  <div class="meta">
    <small>posted on <?php echo $job->getDateTimeObject('created_at')->format('m/d/Y') ?> 

</small>
  </div>

  
  <div class="meta_left">
    <small>Closing date on <?php echo $job->getDateTimeObject('expires_at')->format('m/d/Y') ?></small>
  </div>
 


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


  <!--<div style="padding: 20px 0">
		<a href="<?php echo url_for('job_edit', $job) ?>">Edit</a>
  </div>

-->

<!--</div>
  <div class= "meta_social_networks">

<a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>

  </div>
-->
