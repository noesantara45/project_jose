<?php foreach ($produks_terbaru as $p) : ?>
    <div class="col-md-4">
        <div class="card">

            <a href="<?= base_url('product/' . $p['slug']); ?>">
                <img src="<?= base_url('uploads/' . $p['image']); ?>" class="card-img-top" alt="...">
            </a>

            <div class="card-body">
                <h5 class="card-title">
                    <a href="<?= base_url('product/' . $p['slug']); ?>" style="text-decoration:none; color:black;">
                        <?= $p['name_product']; ?>
                    </a>
                </h5>
                <p class="card-text">Rp <?= number_format($p['price'], 0, ',', '.'); ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>