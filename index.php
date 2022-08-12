<?php include "inc/header.php"; ?>
<main class="container">
	<section class="row">
		<section class="col-md-8 bg- posts border-cover">
		<?php
                $post= new \Admin\Libs\Post();
                foreach($post->find_all() as $p){
                    echo "<article class='media border-bottom border-white my-1'>";
                    echo "<a class='align-self-center' href='#'>
					<img class='img-fluid justify-content-center img-post mr-3' src='admin/images/". 
					$p->getPhoto() . "' alt='post image' /> </a>";
                    echo "<div class='media-body'>";
                    echo "<h4><a href='#'>{$p->getTitle()} </a></h4>";
					echo "<h6>{$p->getPublishedDate()}, Nga <a href='#'>{$p->getAuthor()}</a></h6>";
                    $content=substr($p->getContent(),0,200) . "...";
                    echo "<p>{$content}</p>";
                    echo "</div>";
                    echo "</article>";
                }
            ?>
			
			
			
		</section>
		<?php include "inc/sidebar.php" ?>
	</section>
	
</main>
<?php include "inc/footer.php" ?>