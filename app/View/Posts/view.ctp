<h1><?php echo $post['Post']['title']?></h1>

<p><span class='created'>投稿日時: <?php echo $post['Post']['created']?></span></p>

<p><?php echo $post['Post']['body']?></p>

<p><?php echo $this->Html->link('一覧に戻る',  array('action' => 'index'))?></p>
