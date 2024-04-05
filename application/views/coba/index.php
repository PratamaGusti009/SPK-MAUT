<!-- views/form_view.php -->

<form id="myForm" action="<?= site_url('Coba/process_form'); ?>" method="post">
    <!-- Form fields go here -->

    <?php if ($this->session->userdata('showSubmit') === true): ?>
        <button type="submit" id="submitBtn">Submit</button>
    <?php else: ?>
        <button type="button" id="editBtn">Edit</button>
    <?php endif; ?>

    <button type="button" id="newBtn" style="display: none;">Another Button</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?= base_url('assets/js/custom_script.js'); ?>"></script>