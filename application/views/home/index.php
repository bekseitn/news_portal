<?=$pagination?>

<?php $i=1; foreach($news as $article): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <a href="<?=site_url("home/view/".$article->id)?>"><?=$article->title?></a>
      </div>
      <div class="panel-body">
        <?=$article->preview?>
        <p><?=$article->date?></p>
        <p><?=$article->author?></p>
        <p><?=$article->count?></p>
      </div>
    </div>
<?php $i++; endforeach; ?>
