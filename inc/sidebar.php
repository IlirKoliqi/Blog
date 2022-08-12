<aside class="col-md-4 sidebar">
    <article class="categories ml-1">
        <h4>Categories</h4>
        <div class="list-group list-unstyled mb-3">
            <?php
                $category= new \Admin\Libs\Category;
                foreach($category->find_all() as $cat){
                    echo "<a class='list-group-item list-group-item-light' 
                    href='#'>{$cat->getName()}</a></li>";
                }
            ?>
        </div>
        </div>
        <div class="samesidebar clear">
            <h4>Latest articles</h4>
            <?php
                $post= new \Admin\Libs\Post();
                foreach($post->find_all() as $p){
                    echo "<div class='media border-bottom border-white'>";
                    echo "<a class='align-self-center' href='#'>
                    <img class='img-post-small mr-2' src='admin/images/". $p->getPhoto() . "'alt='post image' /></a>";
                    echo "<div class='media-body'>";
                    echo "<h5><a href='#'>{$p->getTitle()} </a></h5>";
                    $content=substr($p->getContent(),0,50) . "...";
                    echo "<p>{$content}</p>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
</aside>