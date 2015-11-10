<div id="container">
<h1>news Listing</h1>
<?php if($msg = $this->session->flashdata("message")): ?>
 
    <p class="success">
        <?=$msg?>
    </p>
 
<?php endif; ?>
<p><a href="<?=site_url('news/create')?>" class="btn btn-primary">New news</a></p>

<?=$pagination?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>news Title</th>
            <th>news Content</th>
            <th>news Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($news as $article): ?>
        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
            <td><?=$article->id?></td>
            <td><a href="<?=site_url("news/view/".$article->id)?>"><?=$article->title?></a></td>
            <td><?=$article->preview?></td>
            <td><?=$article->date?></td>
            <td><a href="<?=site_url("news/edit/".$article->id)?>" class="btn btn-default">edit</a> 
            <a href="<?=site_url("news/delete/".$article->id)?>" class="btn btn-danger">delete</a></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>