<?php
//Liên kết tới file Connection
require_once('connection.php');
//load danh mục
$query_post_view =  $query_tow_post =  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY count_view DESC , created_at   DESC limit 4  ";

$result_post_view = $conn->query($query_post_view);

$post_view = array();

while ($row = $result_post_view->fetch_assoc()) {
    $post_view[] = $row;
}
?>
<?php foreach ($post_view as $view) { ?>
    <div class="post post-widget">
        <a class="post-img" href="blog-post.php?id=<?= $view['id'] ?>"><img src=./img/<?= $view['thumbnail']; ?> alt="" width="90px" height="90px"></a>
        <div class="post-body">
            <h3 class="post-title"><a href="blog-post.php?id=<?= $view['id'] ?>"><?php echo $view['title'] ?></a></h3>
        </div>
    </div>
<?php } ?>