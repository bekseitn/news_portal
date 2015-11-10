<?=$pagination?>

<?php $i=1; foreach($news as $article): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <a href="<?=site_url("news/view/".$article->id)?>"><?=$article->title?></a>
      </div>
      <div class="panel-body">
        <?=$article->preview?>
        <p><?=$article->date?></p>
      </div>
    </div>
<?php $i++; endforeach; ?>

