<style type="text/css">
    #container
    {
        width:900px;
        background-color: #d8d8d8;
        margin: auto;
        padding:20px;
        font-size:14px;
        font-family:tahoma;
    }
    label
    {
        vertical-align: top;
        padding:5px;
    }
    input,textarea
    {
        padding:5px;
    }
    .success
    {
        color:green;
    }
</style>
<div id="container">
<h1>Edit news: <?= $news->title ?></h1>
<?php if($msg = $this->session->flashdata("message")): ?>
    <p class="success">
        <?=$msg?>
    </p>
<?php endif; ?>
<form action="" method="post">
    <p>
        <label for="title">Title:</label>
        <input type="text" name="news[title]" id="title" value="<?=$news->title?>"/>
    </p>
    <p>
        <label for="preview">news Content:</label>
        <textarea name="news[preview]" id="preview" rows="5" cols="40"><?=$news->preview?></textarea>
    </p>
    <p>
        <input type="submit" name="update_news" value="Update news" />
    </p>
</form>
</div>