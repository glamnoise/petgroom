<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Second name</th>
      <th>Email</th>
      <th>Birthday</th>
      <th>Gender</th>
      <th>Address</th>
      <th>City</th>
      <th>Cap</th>
      <th>Phone</th>
      <th>Cell</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getName() ?></td>
      <td><?php echo $user->getSecondName() ?></td>
      <td><?php echo $user->getEmail() ?></td>
      <td><?php echo $user->getBirthday() ?></td>
      <td><?php echo $user->getGender() ?></td>
      <td><?php echo $user->getAddress() ?></td>
      <td><?php echo $user->getCity() ?></td>
      <td><?php echo $user->getCap() ?></td>
      <td><?php echo $user->getPhone() ?></td>
      <td><?php echo $user->getCell() ?></td>
      <td><?php echo $user->getInfo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
