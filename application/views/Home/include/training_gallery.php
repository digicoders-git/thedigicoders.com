<div class="widget widget_gallery gallery-grid-4">
    <ul class="magnific-image">
        <?php
        $gallery = $this->db->where('status', 'true')->order_by('id', 'desc')->get('tbl_training_gallery')->result();
        foreach ($gallery as $img) {
            ?>
            <li><a href="<?= base_url('public/uploads/training_gallery/') . $img->image ?>" class="magnific-anchor"><img
                        style="height:150px" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public/uploads/training_gallery/') . $img->image ?>"
                        title="<?= $img->title ?>" alt="<?= $img->title ?>"></a></li>
        <?php } ?>
    </ul>
</div>

