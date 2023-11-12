<?php

function validate(array $request): ?array
{
    $errors = null;

    foreach ($request as $key => $value) {
        if (empty($value)) {
            $fieldName = ucfirst(str_replace('_', ' ', $key));
            $errors[$key] = "$fieldName tidak boleh kosong.";
        }
    }

    return $errors;
}

function response(?array $errors): void
{
    if (!empty($errors)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <ul class="mb-0">
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif;
}
