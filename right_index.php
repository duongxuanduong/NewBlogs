<?php
$result_posts_nn = $conn->query("SELECT p.*,c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY RAND () LIMIT 2");

$post_nn = array();

while ($row = $result_posts_nn->fetch_assoc()) {
    $post_nn[] = $row;
}

?>
<!-- post widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Đọc nhiều nhất</h2>
    </div>
    <?php require_once('most_read.php') ?>
    <div class="section-title">
        <h2>Đọc ngẫu nhiên</h2>
    </div>
    <?php foreach ($post_nn as $nn) { ?>
        <div class="post post-thumb">
            <a class="post-img" href="blog-post.php?id=<?= $nn['id'] ?>"><img src="./img/<?= $nn['thumbnail']; ?>" alt="" height="200px"></a>
            <div class="post-body">
                <div class="post-meta">
                    <?php
                    $kt = NULL;
                    $i = 1;
                    foreach ($categorie_post as $cate) {
                        if (strcasecmp($nn['des'], $cate['descripition']) == 0) {
                            $kt = 'post-category cat-' . $i;
                        }
                        if (strcasecmp($nn['des'], $cate['descripition']) == 0) {
                            $kt = 'post-category cat-' . $i;
                        }
                        if (strcasecmp($nn['des'], $cate['descripition']) == 0) {
                            $kt = 'post-category cat-' . $i;
                        }
                        if (strcasecmp($nn['des'], $cate['descripition']) == 0) {
                            $kt = 'post-category cat-' . $i;
                        }
                        $i++;
                        if ($i == 5)
                            $i = 1;
                    }
                    ?>
                    <a class="<?php echo $kt; ?>" href="category.php?id=<?= $nn['idcate'] ?>&cate=<?= $nn['t'] ?>"><?php echo $nn['t']; ?></a>
                    <span class="post-date"><?php echo $nn['created_at']; ?></span>
                </div>
                <h3 class="post-title"><a href="blog-post.php?id=<?= $nn['id'] ?>"><?php echo $nn['title']; ?></a></h3>
            </div>
        </div>
    <?php } ?>
</div>
<!-- /post widget -->

<!-- catagories -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Thể loại</h2>
    </div>
    <div class="category-widget">
        <ul>
            <?php
            $c = 1;
            foreach ($categorie_post as $cate_p) { ?>
                <li><a href="#" class="cat-<?= $c ?>"><?= $cate_p['tible'] ?><span>
                            <?php
                            //tổng các bài
                            $result_countcate = $conn->query("SELECT COUNT(categories_id) as count FROM posts WHERE categories_id =" . $cate_p['id'] . " ");

                            $countcate = $result_countcate->fetch_assoc();

                            echo ($countcate['count']);
                            ?>
                        </span></a></li>
            <?php
                $c = $c + 1;
                if ($c == 5) {
                    $c = 1;
                }
            } ?>
        </ul>
    </div>
</div>
<!-- /catagories -->