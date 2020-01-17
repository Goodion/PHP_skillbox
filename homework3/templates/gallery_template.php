<div class="card" style="width: 24rem;">
    <img src="<?= $fileUrl ?>" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title"><?= $fileName ?></h5>
        <p class="card-text"><?= $fileModificationDate ?></p>
        <p class="card-text"><?= $fileSize ?></p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="deleteListCheckbox[]" value="<?= $fileName ?>">
            <label class="form-check-label" for="<?= $fileName ?>">
                Удалить
            </label>
        </div>
    </div>
</div>