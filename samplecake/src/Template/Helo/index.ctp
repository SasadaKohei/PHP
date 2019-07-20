<div>
    <h3>Index Page</h3>
    <p><?= $message ?></p>
    <?=$this->Form->create(null,[
            'type' => 'post',
            'url'=>['controller'=>'Helo', 'action' => 'index']]
    )?>
    <?=$this->Form->password('pw') ?>
    <?=$this->Form->hidden ('hide', ['value'=>'hidden_message'])?>
    <?=$this->Form->textarea('area') ?>
    <?=$this->Form->checkbox('check', ['id'=>'check'])?>
    <?=$this->Form->label('check', 'check!!')?>
    <?=$this->Form->text('text1')?>
    <?=$this->Form->submit('OK')?>
    <?=$this->Form->end()?>
    </form>
</div>