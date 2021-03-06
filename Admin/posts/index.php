<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true) {
  header('Location: ../login.php');
}
//Liên kết tới file Connection
require_once('../../connection.php');
//lấy danh mục
$query_posts =  "SELECT * from posts";

$result_posts = $conn->query($query_posts);

$posts_post = array();

while ($row = $result_posts->fetch_assoc()) {
  $posts_post[] = $row;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Zent - Education And Technology Group</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <!-- Data table -->
  <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Category List</h3>
    <a href="posts_add.php" type="button" class="btn btn-primary">Thêm mới</a>
    <a href="../index.php" type="button" class="btn btn-primary">Về trang Admin</a>
    <?php if (isset($_COOKIE['msg'])) { ?>
      <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
      </div>
    <?php } ?>
    <table id="example" class="display" style="width:100%">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Thumbnail</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($posts_post as $status) { ?>
          <tr>
            <th scope="row"><?= $status['id'] ?></th>
            <td><?= $status['title'] ?></td>
            <td><?= $status['description'] ?></td>
            <td><img src="../../img/<?= $status['thumbnail'] ?>" height="100px"></td>
            <td>
              <a href="posts_detail.php?id=<?= $status['id'] ?>" type="button" class="btn btn-default">Xem</a>
              <a href="posts_edit.php?id=<?= $status['id'] ?>" type="button" class="btn btn-success">Sửa</a>
              <a href="posts_delete.php?id=<?= $status['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-warning">Xóa</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      </thead>
      <tfoot>
        <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>

        </tr>
      </tfoot>
    </table>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
  </div>
</body>

</html>