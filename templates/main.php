<?php require_once __DIR__ . '/_header.php';
use App\App;
use App\Models\Post as Post;
require_once '../config.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

    <table>
    <tr>/posts - to get all existing posts | GET </tr><br>
    <tr>/posts/id - to get post by id  | GET</tr><br>
    <tr>/posts/create - to create new post | POST </tr><br>
    <tr>/posts/delete/id - to delete existing post | DELETE </tr><br>
    <tr>/posts/edit/id - to edit existing post | PUT </tr><br><br>


        <p>Tested with Insomnia REST Client</p>


    </table>
            </div>
        </div>
    </div>
</div>


<?php require_once __DIR__ . '/_footer.php';