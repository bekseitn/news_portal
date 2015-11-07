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
<h1>Create New news</h1>
<?php if($msg = $this->session->flashdata("message")): ?>
 
    <p class="success">
        <?=$msg?>
    </p>
 
<?php endif; ?>
<form action="" method="post">
    <p>
        <label for="title">news Title:</label>
        <input type="text" name="news[title]" id="title"/>
    </p>
    <p>
        <label for="preview">news preview:</label>
        <textarea name="news[preview]" id="preview" rows="5" cols="40"></textarea>
    </p>
    <p>
        <input type="submit" name="create_news" value="Create news" />
    </p>
</form>
</div>