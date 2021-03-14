<?php

/*echo "<pre>";
print_r($clients); // or var_dump($data);
echo "</pre>";*/
/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<h1>Novo Cliente</h1>


<form name="form" method="post" action="<?= isset($clients) ? Url::to(['clients/update', 'id' => $clients->id]) : Url::to(['clients/create']); ?>">
    <input type="hidden" name="<?= \yii::$app->request->csrfParam; ?>" value="<?= \yii::$app->request->csrfToken; ?>">
    <?php if (isset($clients)) { ?>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" value="<?= $clients->name; ?>">
        </div>
    <?php } else { ?>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome">
        </div>
    <?php } ?>

    <?php if (isset($clients)) { ?>
        <div class="form-group">
            <label for="email">email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email" value="<?= $clients->email ?>">
        </div>
    <?php } else { ?>
        <div class="form-group">
            <label for="email">email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email">
        </div>
    <?php }

    if (isset($clients)) {
        $nameButton = "Atualizar";
    } else {
        $nameButton = "Enviar";
    }
    ?>
    <button type="submit" class="btn btn-primary"><?= $nameButton ?></button>
</form>