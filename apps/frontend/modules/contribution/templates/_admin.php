<div id="job_actions">
  <h3>Admin</h3>
  <ul>
    <?php if (!$contribution->getIsActivated()): ?>
      <li><?php echo link_to('Edit', 'contribution_edit', $contribution) ?></li>
<li>
  <?php echo link_to('Publish', 'contribution_publish', $contribution, array('method' => 'put')) ?>
</li>
    <?php endif ?>
    <li><?php echo link_to('Delete', 'contribution_delete', $contribution, array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></li>
    <?php if ($contribution->getIsActivated()): ?>
      <li<?php $contribution->expiresSoon() and print ' class="expires_soon"' ?>>
        <?php if ($contribution->isExpired()): ?>
          Expired
        <?php else: ?>
          Expires in <strong><?php echo $contribution->getDaysBeforeExpires() ?></strong> days
        <?php endif ?>
 
        <?php if ($contribution->expiresSoon()): ?>
         - <a href="">Extend</a> for another <?php echo sfConfig::get('app_active_days') ?> days
        <?php endif ?>
      </li>
    <?php else: ?>
      <li>
        [Bookmark this <?php echo link_to('URL', 'contribution_show', $contribution, true) ?> to manage this job in the future.]
      </li>
    <?php endif ?>
  </ul>
</div>