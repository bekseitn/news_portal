<div id="container">
<h1>Новости</h1>
<p><a href="<?=site_url('news/create')?>" class="btn btn-primary">Добавить новость</a></p>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Превью</th>
            <th>Дата добавления</th>
            <th>Автор</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($news as $article): ?>
        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
            <td><?=$article->id?></td>
            <td><?=$article->title?></td>
            <td><?=$article->preview?></td>
            <td><?=$article->date?></td>
            <td><?=$article->author?></td>
            <td><a href="<?=site_url("news/edit/".$article->id)?>" class="btn btn-default">Изменить</a> 
            <a href="<?=site_url("news/delete/".$article->id)?>" class="btn btn-danger">Удалить</a></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>