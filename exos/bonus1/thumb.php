    <section class="cam-shop__item-list">
        <?php foreach ($items as $item) : ?>
            <figure class="cam-shop__item-list__figure">
                <img src="bonus1/images/<?=$item['img'] ?>" alt="<?=$item['name'] ?>" title="<?=$item['name'] ?>">
                <figcaption class="cam-shop__item-list__figure__name"><?=$item['name'] ?> <?=$item['price'] ?>&#x20a1;</figcaption>
                <figcaption class="cam-shop__item-list__figure__desc"><?=$item['desc'] ?></figcaption>
            </figure>
        <?php endforeach ?>
    </section>
</main>