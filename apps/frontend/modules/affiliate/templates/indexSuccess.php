<h1>Stackend affiliates List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Url</th>
      <th>Email</th>
      <th>Token</th>
      <th>Is active</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($stackend_affiliates as $stackend_affiliate): ?>
    <tr>
      <td><a href="<?php echo url_for('affiliate/edit?id='.$stackend_affiliate->getId()) ?>"><?php echo $stackend_affiliate->getId() ?></a></td>
      <td><?php echo $stackend_affiliate->getUrl() ?></td>
      <td><?php echo $stackend_affiliate->getEmail() ?></td>
      <td><?php echo $stackend_affiliate->getToken() ?></td>
      <td><?php echo $stackend_affiliate->getIsActive() ?></td>
      <td><?php echo $stackend_affiliate->getCreatedAt() ?></td>
      <td><?php echo $stackend_affiliate->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('affiliate/new') ?>">New</a>
