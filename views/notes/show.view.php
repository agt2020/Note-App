<?php require(base_path('views/partials/head.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>
<?php require(base_path('views/partials/header.php')); ?>

<main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p class="mb-6">
                        <a href="/notes" class="text-blue-500 hover:underline">
                                Back To Notes ...
                        </a>
                </p>

                <p class="mb-6">
                        <?= htmlspecialchars($note['body']) ?>
                </p>

                <form method="POST">
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                        <button type="submit" class="text-sm text-red-500">Delete</button>
                </form>
        </div>
</main>

<?php require(base_path('views/partials/footer.php')); ?>