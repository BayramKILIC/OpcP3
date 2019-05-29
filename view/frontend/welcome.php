<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <div class="form-signin">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Bienvenu sur mon site</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non ornare enim. Vivamus tortor mi, pharetra at diam id, dapibus pulvinar ipsum. Aenean id vehicula ipsum. Cras finibus lacinia laoreet. In hac habitasse platea dictumst. Phasellus rhoncus neque lectus, nec imperdiet lacus dictum a. Donec tellus nisl, rutrum sit amet leo at, placerat eleifend enim. Vivamus vestibu [...]  <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
        </div>






        <button class="btn btn-lg btn-primary btn-block" type="submit">Commencez la lecture</button>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>