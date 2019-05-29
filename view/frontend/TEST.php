<script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=your_API_key'></script>

<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>


<?php if($message = $this->getFlashMessage()): ?>
    <div class="alert alert-<?= $message[0]?>" role="alert">
        <?= $message[1] ?>
    </div>
<?php endif; ?>

<?= $content ?>