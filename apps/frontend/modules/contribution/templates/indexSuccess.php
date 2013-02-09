<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
  <table class="jobs">
    <?php foreach ($stackend_contributions as $i => $stackend_contribution): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="location"><?php echo $stackend_contribution->getLocation() ?></td>
        <td class="position">
          <a href="<?php echo url_for('contribution/show?id='.$stackend_contribution->getId()) ?>">
            <?php echo $stackend_contribution->getPosition() ?>
          </a>
        </td>
        <td class="company"><?php echo $stackend_contribution->getCompany() ?></td>
      </tr>
    <?php endforeach ?>
  </table>
</div>
