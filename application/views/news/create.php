<h1>Добавить новость</h1>
<?php if($msg = $this->session->flashdata("message")): ?>
 
    <p class="success">
        <?=$msg?>
    </p>
 
<?php endif; ?>
<form action="" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Заголовок:</label>
        <div class="col-sm-10">
            <input type="text" name="news[title]" id="title" class="form-control"/>
        </div>    
    </div>

    <div class="form-group">
        <label for="preview" class="col-sm-2 control-label">Превью:</label>
        <div class="col-sm-10">
            <textarea name="news[preview]" id="preview" rows="5" cols="40" class="form-control"></textarea>
        </div>    
    </div>

    <div class="form-group">
        <label for="preview" class="col-sm-2 control-label">Текст:</label>
        <div class="col-sm-10">
            <?php echo $this->ckeditor->editor('news[body]',@$default_value);?>
        </div>    
    </div>    

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="create_news" value="Добавить новость"  class="btn btn-default"/>
        </div>
    </div>

</form>
</div>