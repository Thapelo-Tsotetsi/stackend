<td class="sf_admin_text sf_admin_list_td_company">
  <?php echo $stackend_job->getCompany() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_position">
  <?php echo link_to($stackend_job->getPosition(), 'stackend_job_edit', $stackend_job) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_location">
  <?php echo $stackend_job->getLocation() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_url">
  <?php echo $stackend_job->getUrl() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_activated">
  <?php echo get_partial('job/list_field_boolean', array('value' => $stackend_job->getIsActivated())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $stackend_job->getEmail() ?>
</td>
