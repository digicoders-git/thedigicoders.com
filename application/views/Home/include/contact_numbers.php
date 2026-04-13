<div class="row">
        <?php
        $contacts = $this->db->where('status', 'true')->get('tbl_contact_numbers')->result();
        foreach ($contacts as $contact) {
                ?>
                <div class="col-12 mr-5 mt-3"><i class="ti-mobile"></i><a href="tel:<?= $contact->number ?>">
                                <?= $contact->number ?>
                        </a></div>
        <?php } ?>
</div>

