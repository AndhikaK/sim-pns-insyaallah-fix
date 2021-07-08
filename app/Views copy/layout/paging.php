<nav class="my-4 pt-2" aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination  pagination-circle pg-blue mb-0">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item disabled">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['title'] == $page ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>