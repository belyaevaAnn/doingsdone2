<?php require_once 'add.php'; ?>
<main class="content__main">
    <h2 class="content__main-heading">Добавление задачи</h2>
    <form class="form"  action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>
            <?php $className = isset($errors['name']) ? "form__input--error" : "";?>
            <input class="form__input <?= $className; ?>" type="text" name="name" id="name" value="<?= getPosVal('name'); ?>" placeholder="Введите название">
            <?php if (isset($errors['name'])): ?> <p class="form__message"><?= $errors['name']; ?></p> <?php endif;?>
        </div>

        <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>

            <select class="form__input form__input--select" name="project" id="project">
                <?php foreach ($category as $value):?>
                <option value="<?=$value['id']?>" <?php if($_GET['categ']==$value['id']):?>selected <?php endif;?>><?=$value['category']?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>
            <?php $className = isset($errors['date']) ? "form__input--error" : ""; ?>
            <input class="form__input form__input--date <?= $className; ?>" type="text" name="date" id="date" value="<?= getPosVal('date'); ?>" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <?php if (isset($errors['date'])): ?> <p class="form__message"><?= $errors['date']; ?></p> <?php endif;?>
        </div>

        <div class="form__row">
            <label class="form__label" for="file">Файл</label>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="file" id="file" value="">

                <label class="button button--transparent" for="file">
                    <span>Выберите файл</span>
                </label>
            </div>
        </div>

        <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
        </div>
    </form>
</main>