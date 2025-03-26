<?php
    /* @var \Vehica\Widgets\Car\Single\TermsSingleCarWidget $vehicaCurrentWidget */
    global $vehicaCurrentWidget;
    /* @var \Vehica\Model\Post\Car $vehicaCar */
    global $vehicaCar;
    if (!$vehicaCar) {
        return;
    }
    
    $vehicaUser = $vehicaCar->getUser();
    if (!$vehicaUser) {
        return;
    }
?>
<div class="vehica-user-email-v2">
    <div style="display: flex; justify-content: center;" class="vehica-phone-show-number">
        <a class="show-email" style="display: inline-block; float: none;width: auto;" data-email="<?php echo base64_encode($vehicaUser->getMail()); ?>">
            <i style="line-height:.6;" class="fa fa-envelope"></i>
            <span>
            <?php echo trav_hide_mail(esc_html($vehicaUser->getMail())); ?>
        </span>
        </a>
    </div>
</div>
<script>
    $ = jQuery;
    $(function () {
        $(document).on('click', '.show-email', function (e) {
            let mail = atob($(this).data('email'));
            $(this).find('span').text(mail);
        });
    })
</script>