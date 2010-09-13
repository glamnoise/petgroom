<h1>Dogs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Photo</th>
      <th>Gender</th>
      <th>Birthday</th>
      <th>User</th>
      <th>Breed</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dogs as $dog): ?>
    <tr>
      <td><a href="<?php echo url_for('dog/edit?id='.$dog->getId()) ?>"><?php echo $dog->getId() ?></a></td>
      <td><?php echo $dog->getName() ?></td>
      <td><?php echo $dog->getPhoto() ?></td>
      <td><?php echo $dog->getGender() ?></td>
      <td><?php echo $dog->getBirthday() ?></td>
      <td><?php echo $dog->getUserId() ?></td>
      <td><?php echo $dog->getBreedId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('dog/new') ?>">New</a>
