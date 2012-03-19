<h1>ブログ記事一覧</h1>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

<?php foreach ($posts as $post): ?>
    <h2 class='post-title'><?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></h2>
    <?php echo $post['Post']['body'];?><br />
    <span class='created'>投稿日時：<?php echo $post['Post']['created']; ?></span>
    <?php echo $this->Form->postLink(
        '記事削除',
        array('action' => 'delete', $post['Post']['id']),
        array('confirm' => '本当に削除しますか？'));
    ?>
    <?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id']));?>
    <?php echo $post['Post']['id']; ?>
    <hr><p>
<?php endforeach; ?>

<?php echo $this->Html->link('新しい記事を書く', array('controller' => 'posts', 'action' => 'add')); ?>
