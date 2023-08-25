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

                <footer>
                        <a href="/notes/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Edit</a>

                        <p class="mb-3">
                                <form method="POST" action="/notes">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                                        <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
                                </form>
                        </p>
                </footer>
        </div>
</main>

<?php require(base_path('views/partials/footer.php')); ?>