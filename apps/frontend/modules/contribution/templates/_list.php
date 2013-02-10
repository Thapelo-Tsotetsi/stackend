<table class="jobs">
  <?php foreach ($jobs as $i => $contribution): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">
        <?php echo $contribution->getLocation() ?>
      </td>
      <td class="position">
        <?php echo link_to($contribution->getPosition(), 'contribution_show_user', $contribution) ?>
      </td>
      <td class="company">
        <?php echo $contribution->getCompany() ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
