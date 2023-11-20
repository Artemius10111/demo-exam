<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Домашняя страница</h1>

        <p id="counter">Счётчик обновится в ближайшие 3 секунды</p>
        <input type="button" value="Разрешить звуковые уведомления">
    </div>

    <div class="body-content">

        <div class="row">
            <?php
                foreach($problems as $problem){
                    echo '
                    <div class="col-lg-3">
                        <h2>'.$problem->name.'</h2>
                        <p>'.$problem->description.'</p>
                        <img alt="sdf" class="img-responsive" src="uploads/'.$problem->photoAfter.'"
                        data-before="uploads/'.$problem->photoBefore.'" data-after="uploads/'.$problem->photoAfter.'"
                        onMouseOver="hover(this)" onMouseOut="back(this)">
                    </div>
                    ';
                }
            ?>

    </div>
</div>
<script>
let i = 0;
function hover(el){
    el.src = el.dataset.before;
}

function back(el){
    el.src = el.dataset.after;
}

function updateCounter(){
    $.ajax({
        type: 'GET',
        url: '<?= Url::toRoute('/site/counter') ?>',
        dataType: 'text',
        success: function (response){
            if(i != response){
                // Звуковое уведомление
                let a = new Audio('./1.mp3');
                a.play();
                i = response;
            }
            $('#counter').html('Решено заявок: ' + response);
        }
    });
}
setInterval(updateCounter, 3000);
</script>