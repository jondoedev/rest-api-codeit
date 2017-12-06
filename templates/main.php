<?php require_once __DIR__ . '/_header.php';
use App\App;
use App\Models\Post;
?>


<div>
<?php
//TODO Make a cycle that will increase ID by 1

$post = Post::find(1);
echo '<h3>'.$post->title.'</h3><br>'.
    $post->content.'<br>'.
    '<h4>'.$post->author.'</h4>';

?>
</div>



<?php //require_once __DIR__ . '/_footer.php'; ?>