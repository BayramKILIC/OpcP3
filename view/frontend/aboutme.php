<?php ob_start(); ?>


        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">A propos de ce blog</h1>
            <img class="mb-4"src="https://image.flaticon.com/icons/svg/609/609150.svg" alt="" width="72" height="72">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non ornare enim.
                Vivamus tortor mi, pharetra at diam id, dapibus pulvinar ipsum. Aenean id vehicula ipsum.
                Cras finibus lacinia laoreet. In hac habitasse platea dictumst. Phasellus rhoncus neque lectus,
                nec imperdiet lacus dictum a. Donec tellus nisl, rutrum sit amet leo at, placerat eleifend enim.
                Vivamus vestibulum laoreet vestibulum. Ut molestie lacus cursus rutrum sodales.
                Integer ut euismod enim. Suspendisse ullamcorper commodo libero sit amet rhoncus.
                Vivamus convallis diam non eros lobortis finibus.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non ornare enim.
                Vivamus tortor mi, pharetra at diam id, dapibus pulvinar ipsum. Aenean id vehicula ipsum.
                Cras finibus lacinia laoreet. In hac habitasse platea dictumst. Phasellus rhoncus neque lectus,
                nec imperdiet lacus dictum a. Donec tellus nisl, rutrum sit amet leo at, placerat eleifend enim.
                Vivamus vestibulum laoreet vestibulum. Ut molestie lacus cursus rutrum sodales.
                Integer ut euismod enim. Suspendisse ullamcorper commodo libero sit amet rhoncus.
                Vivamus convallis diam non eros lobortis finibus.</p>
        </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>