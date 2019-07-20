<div>
    <h3>Index Page</h3>
    <p><?= $message ?></p>
    <?=$this->Form->create(null,[
            'type' => 'post',
            'url'=>['controller'=>'Helo', 'action' => 'index']]
    )?>

<!--年月日のポップアップを作成する-->
    <?=$this->Form->date('date', [
            'year'=>['style'=>'width:100px;'],
            'month'=>['style'=>'width:100px;'],
            'day'=>['style'=>'width:100px;']
    ])?>
    <hr>
<!--  時分のポップメニューを作成する  -->
    <?=$this->Form->time('time',[
        'interval'=>5,
        'hour'=>['style'=>'width:100px;']
    ])?>

    <?=$this->Form->submit('OK')?>
    <?=$this->Form->end()?>
    </form>
</div>