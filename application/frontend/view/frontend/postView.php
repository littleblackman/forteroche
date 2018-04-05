<?php

$token = bin2hex(32);
$_SESSION['token'] = $token;

$title = htmlspecialchars($post['title']) ?>



<!doctype html>

<head>
    <link href="public/css/StyleHome.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?familly=Crete+Round" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title> Vue du <?=htmlspecialchars($post['title'])?></title>
</head>





<div class="container-fluid">
    <div class="col-sm-12">
        <div class="chapter-title">
                <?= htmlspecialchars($post['title']) ?><br/><br/>
        </div>
            <div>
                <strong>le <?= $post['date_created_fr'] ?></strong><br/><br/>
                <?= nl2br($post['content']) ?>
                <strong><?= nl2br($post['author']) ?></strong>
            </div>
    </div>
    </br></br>
</div>



<div class="btn-custom" ><hr>


    <div class="print-comments">
        <div class="comments"</div>
		<?php
		while ($comment = $comments->fetch())
		{
			?>
            <div>Pseudo : <?= htmlspecialchars($comment['author']) ?></strong> <br/>
                Le <?= $comment['date_comment_fr'] ?></div><br/>
            <p><?= nl2br($comment['comment']) ?></p><br/><br/>
            <div>
                <form action="index.php?action=flag&amp;id=<?= $comment['id'] ?>" method="post">
                <input type="submit" name="Flag"  value="Signaler le commentaire" class="button2" /><br/><br/><br/><hr>
                <input type ="hidden" name="token" value="<?php echo $token;?>" />
                </form>
            </div>


			<?php
		}
		?>
    </div>
</div>

        <div>
       
            <h4> Vous pouvez ajouter vos commentaires ou signaler un commentaire indésirable.</h4>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment" rows="10" cols="45"></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6Lf8cEsUAAAAAE5bBIHVb0LJ_Zjt6tfTwcV3mX_X"></div>
                <div>
                    <input type="submit" class="button1" />
                </div>
            </form>
         </div>
    </div>
</div>
</div>

