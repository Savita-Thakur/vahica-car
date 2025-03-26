<?php

/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php //do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer username */ ?>
<p><?php // printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $user_login ) ); ?></p>
<?php /* translators: %s: Store name */ ?>
<p><?php //  printf( esc_html__( 'Someone has requested a new password for the following account on %s:', 'woocommerce' ), esc_html( wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES ) ) ); ?></p>
<?php /* translators: %s: Customer username */ ?>
<p><?php //  printf( esc_html__( 'Username: %s', 'woocommerce' ), esc_html( $user_login ) ); ?></p>
<p><?php /// esc_html_e( 'If you didn\'t make this request, just ignore this email. If you\'d like to proceed:', 'woocommerce' ); ?></p>





<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
    <!-- Your title goes here -->
    <title>Newsletter</title>
    <!-- End title -->

    <!-- Start stylesheet -->
    <style type="text/css">
      a,a[href],a:hover, a:link, a:visited {
        /* This is the link colour */
        text-decoration: none!important;
        color: #0000EE;
      }
      .link {
        text-decoration: underline!important;
      }
      p, p:visited {
        /* Fallback paragraph style */
        font-size:15px;
        line-height:24px;
        font-family:'Helvetica', Arial, sans-serif;
        font-weight:300;
        text-decoration:none;
        color: #000000;
      }
      h1 {
        /* Fallback heading style */
        font-size:22px;
        line-height:24px;
        font-family:'Helvetica', Arial, sans-serif;
        font-weight:normal;
        text-decoration:none;
        color: #000000;
      }
      .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;}
      .ExternalClass {width: 100%;}
    </style>
    <!-- End stylesheet -->
</head>

  <!-- You can change background colour here -->
  <body style="text-align: center; margin: 0;  padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #f2f4f6; color: #000000" align="center">
  
  <!-- Fallback force center content -->
  <div style="text-align: center;">

    <!-- Email not displaying correctly 
    <table align="center" style="text-align: center; vertical-align: middle; width: 600px; max-width: 600px;" width="600">
      <tbody>
        <tr>
          <td style="width: 596px; vertical-align: middle;" width="596">

            <p style="font-size: 11px; line-height: 20px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #000000;">Is this email not displaying correctly? <a class="link" style="text-decoration: underline;" target="_blank" href="https://fullsphere.co.uk/html-emails/free-template/"><u>Click here</u></a> to view in browser</p>

          </td>
        </tr>
      </tbody>
    </table>
     Email not displaying correctly -->
    
    <!-- Start container for logo -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #fcb500;" width="600">
      <tbody>
        <tr style="background-color: #fcb500;">
          <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;" width="596">

            <!-- Your logo is here -->
            <img style="width: 180px; max-width: 180px; height: 85px; max-height: 85px; text-align: center; color: #ffffff;" alt="Logo" src="images/travel_cars.png" align="center" width="180" height="85">

          </td>
        </tr>
      </tbody>
    </table>
    <!-- End container for logo -->

    <!-- Start single column section -->
    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;" width="600">
        <tbody>
          <tr>

            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;" width="596">
<p class="cgHgbA pYZEjA Xp24Nw PanoWQ" style="font-family: &quot;YAEtfq3j4CA 0&quot;, _fb_, auto; font-size: 60px; color: rgb(0, 0, 0); line-height: 65px; letter-spacing: -0.05em; --pY_8zA: 0; text-transform: none; --oJepFA: 0; --uYCVzQ: none; list-style-type: none;"><span class="OYPEnA" style="font-weight: 400; font-style: normal; color: rgb(0, 0, 0); font-kerning: none; text-decoration: none;">FORGOT YOUR<br>PASSWORD?</span></p>

<span class="OYPEnA" style="font-weight: 400;  font-size:25px;	 font-style: normal; color: rgb(0, 0, 0); font-kerning: none; text-decoration: none;">Not to worry, we got you! Let’s get you a<br>new one.</span> 
<p class="cgHgbA pYZEjA Xp24Nw PanoWQ" style="font-family: &quot;YAFcfuZZeUg 0&quot;, _fb_, auto; font-size: 33.3333px; color: rgb(0, 0, 0); line-height: 46px; letter-spacing: -0.02em; --pY_8zA: 0; text-transform: none; --oJepFA: 0; --uYCVzQ: none; list-style-type: none;">
<a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'id' => $user_id ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
<span class="OYPEnA" style="font-weight: 700; font-style: normal; color: rgb(0, 0, 0); font-kerning: none; text-decoration: none; position: absolute; width: 384.299px; height: 87.8071px; padding-top: 18px;">RESET PASSWORD</span>
<svg class="qY_pAA" viewBox="0 0 75.9109532822994 17.344612137556766" style="overflow: hidden; width: 384.299px; height: 87.8071px; background-color: #fcb500;"><defs><clipPath id="__id2"><path d="M0,0L75.9109532822994,0L75.9109532822994,17.344612137556766L0,17.344612137556766Z"></path></clipPath></defs><path d="M0,0L75.9109532822994,0L75.9109532822994,17.344612137556766L0,17.344612137556766Z" stroke="#000000" stroke-width="4" stroke-dasharray="12,2" stroke-linecap="butt" clip-path="url(#__id2)" fill="none" vector-effect="non-scaling-stroke"></path></svg>
</a>
</p>

 
 </td>
			</tr><tr>	
          </tr>
        </tbody>
      </table>
      <!-- End single column section -->

      <!-- Start footer -->
      <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #fcb500;" width="600">
        <tbody>
          <tr style="background-color: #fcb500;">
            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 5px; padding-bottom: 5px;" width="596">
			
              <p style="font-size: 19px; line-height: 20px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: rgb(255, 255, 255); line-height: 37px; letter-spacing: -0.02em;">
               INFO@TRAVELCARSNZ.COM
              </p>	
            </td>
          </tr>
        </tbody>
      </table>
      <!-- End footer -->
    
      <!-- Start unsubscribe section -->
      <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px;" width="600">
        <tbody>
          <tr>
            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px;" width="596">
              
              <p style="font-size: 12px; line-height: 12px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; color: #000000;">
                Not wanting to receive these emails?
              </p>

              <p style="font-size: 12px; line-height: 12px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; color: #000000;">
                You can <a style="text-decoration: underline; color: #000000;" href="insert-unsubscribe-link-here"><u>unsubscribe here</u></a>
              </p>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- End unsubscribe section -->
  
  </div>

  </body>

</html>