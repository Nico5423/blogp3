<?php
dbConnect


  
    
    $maintenant=date('Y-m-d H:i:s');

    var_dump($maintenant)
  

    $req = $bd->prepare('INSERT INTO table_comments(post_id, comment_author, comment_content, comment_creation) VALUES(:post_id, :comment_author, :comment_content, :comment_creation)');



    $req->execute(array(
    'post_id' => $idRef,
    'comment_author' => $commentAuthor,
    'comment_content' => $commentContent,
    'comment_creation' => $maintenant,
    ));
}
