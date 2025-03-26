<?php

function register_custom_email_endpoint() {
    register_rest_route('custom/v1', '/send-email-notification', array(
        'methods'  => 'POST',
        'callback' => 'handle_send_email_request',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'register_custom_email_endpoint');

/* api url path https://travelcarsnz.com/wp-json/custom/v1/send-email-notification*/
function handle_send_email_request(WP_REST_Request $request) {
	  echo "<pre>";
	  print_r($request);
}


/*onload popup show start code*/
function homepage_popup_shortcode() {
ob_start();?>
<style type="text/css">
.overlay_pop {
display: none;
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
z-index: 999;
}
#popuponload {
display: none;
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background-color: white;
padding: 20px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
z-index: 1000;
width: 500px;
}
.close-btn {
    position: absolute;
    top: 4px;
    right: 6px;
    cursor: pointer;
    background-color: white;
    border: 1px solid black;
    border-radius: 50%;
    width: 31px;
    height: 31px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

td, th {border: none!important;}
.tnp-field.tnp-field-email input {
    width: 70%;
    max-width: 100%;
    padding: 4px 10px !important;
    border: 0;
    background: #fff;
    margin: auto;
}
.tnp-field.tnp-field-button input.tnp-submit {
    padding: 9px 38px 5px;
    font-size: 16px;
    letter-spacing: 1.8px;
    background: #ffac1e;
    border: 0;
    outline: none;
    cursor: pointer;
	margin: 20px auto 0;
    display: inherit;
    height: auto !important;
    line-height: normal;
}

.tnp-field.tnp-field-email label {
    display: none;
}
</style>

  <!-- Fallback force center content -->
  <div id="popuponload" style="text-align: center;"> 
    
    <!-- Start single column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 500px; background-color: #ffffff; position: absolute;
      margin: auto;
      left: 0;
      right: 0;
      top: 0;
    bottom: 0;" width="600">
        <tr>
      <td style="background:rgb(35, 79, 118); padding: 10px 10px 30px; text-align: center;">
        <span class="close-btn">&times;</span>
      <img src="https://travelcarsnz.com/wp-content/uploads/2024/07/logo-1.webp" style="width: 130px;">
        <h5 style="font-size: 18px;color:#fff;line-height: 40px;letter-spacing: 0.205em;text-transform: uppercase;list-style-type: none;margin: 0 0 10px;">join TRAVEL CARS NEW ZEALAND</h5>
        <h1 style="color: #ffac1e;font-size: 50px;line-height: normal;margin-bottom: 22px;    padding: 0 0 10px;">SUBSCRIBE NOW!</h1>
        <p style="color:#fff;line-height:1.4;letter-spacing: 0.098em;--pY_8zA: 0;text-transform: uppercase;--oJepFA: 0;--uYCVzQ: none;list-style-type: none; font-size: 18px;     font-weight: 500 !important;">MONTHLY UPDATES & TRAVEL<br>DISCOUNTS</p> 
        <?php echo do_shortcode('[newsletter_form]'); ?>
      </td>
    </tr>
      </table>
</div>

<?php
        $output = ob_get_clean(); 
        return $output; 
}
add_shortcode('homepage_popup', 'homepage_popup_shortcode');
/*end onload popup code in wp */

?>