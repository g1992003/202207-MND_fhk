<?php if ($end_page > 1) { ?>
    <dl class="page">
        <!-- 若沒有上三則或下三則請使用 nopage -->
        <dt class="ltbn_up <?php echo $p == 1 ? "nopage" : ""; ?>">
            <a <?php echo $p == 1 ? '' : "href='" . $page_set  . "1'"; ?>>
                <span></span>
            </a>
        </dt>
        <!-- 若沒有上一則或下一則請使用 nopage -->
        <dt class="ltbn <?php echo $p == 1 ? "nopage" : ""; ?>">
            <a <?php echo $p == 1 ? '' : "href='" . $page_set . ($p - 1) . "'"; ?>>
                <span></span>
            </a>
        </dt>
        <?php for ($i = $start_page; $i <= $end_page; $i++) { ?>
            <dd class="<?php echo $p == $i ? 'active' : ''; ?>">
                <a <?php echo $i == $p ? '' : "href='" . $page_set . $i . "'"; ?>><span><?php echo ($i < 9) ? "0" . $i : $i; ?></span></a>
            </dd>
        <?php } ?>
        <dt class="rtbn <?php echo $p == $maxPage ? "nopage" : ""; ?>">
            <a <?php echo $p == $maxPage ? '' : "href='" . $page_set . ($p + 1) . "'"; ?>>
                <span></span>
            </a>
        </dt>
        <dt class="rtbn_up <?php echo $p == $maxPage ? "nopage" : ""; ?>">
            <a <?php echo $p == $maxPage ? '' : "href='" . $page_set . $maxPage . "'"; ?>>
                <span></span>
            </a>
        </dt>
    </dl>
<?php } ?>