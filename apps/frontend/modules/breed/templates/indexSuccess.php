<h1>Breeds List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($breeds as $breed): ?>
    <tr>
      <td><a href="<?php echo url_for('breed/edit?id='.$breed->getId()) ?>"><?php echo $breed->getId() ?></a></td>
      <td><?php echo $breed->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('breed/new') ?>">New</a>
