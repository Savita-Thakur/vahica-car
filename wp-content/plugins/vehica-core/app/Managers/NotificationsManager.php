<?php


namespace Vehica\Managers;


use Vehica\Core\Manager;
use Vehica\Core\Notification;
use Vehica\Model\Post\Car;
use Vehica\Model\Post\Config\Setting;
use Vehica\Model\User\User;

/**
 * Class NotificationsManager
 * @package Vehica\Managers
 */
class NotificationsManager extends Manager
{

    public function boot()
    {
        add_action('admin_post_vehica_panel_save_notifications', [$this, 'save']);

        add_action('vehica/notification/' . Notification::MAIL_CONFIRMATION, [$this, 'mailConfirmation']);

        add_action('vehica/notification/' . Notification::RESET_PASSWORD, [$this, 'resetPassword'], 10, 2);

        add_action('vehica/notification/' . Notification::CAR_APPROVED, [$this, 'carApproved']);

        add_action('vehica/notification/' . Notification::CAR_DECLINED, [$this, 'carDeclined']);

        add_action('vehica/notification/' . Notification::CAR_PENDING, [$this, 'carPending']);

        add_action('vehica/notification/' . Notification::NEW_CAR_PENDING, [$this, 'newCarPending']);

        add_action('vehica/notification/' . Notification::WELCOME_USER, [$this, 'welcomeUser']);

        add_filter('wp_mail_from', static function ($mail) {
            if (empty(vehicaApp('settings_config')->getSenderMail())) {
                return $mail;
            }

            return vehicaApp('settings_config')->getSenderMail();
        });

        add_filter('wp_mail_from_name', static function ($name) {
            if (empty(vehicaApp('settings_config')->getSenderName())) {
                return $name;
            }

            return vehicaApp('settings_config')->getSenderName();
        });
    }

    /**
     * @param User $user
     */
    public function welcomeUser(User $user)
    {
        $notification = Notification::getByKey(Notification::WELCOME_USER);
        if (!$notification || !$notification->isEnabled()) {
            return;
        }

        $title = str_replace('{userDisplayName}', $user->getName(), $notification->title);
        //$message = str_replace('{userDisplayName}', $user->getName(), $notification->message);

        $message='<table align="center" style="text-align: center; vertical-align: top; width: 598px; max-width: 600px; background-color: #fcb500;" width="600">
   <tbody>
      <tr style="background-color: #fcb500;">
         <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 5px; padding-bottom: 5px;" width="596"><img style="width: 140px; max-width: 140px; height: 65px; max-height: 55px; text-align: center; color: #ffffff;" alt="Logo" src="https://travelcarsnz.com/wp-content/uploads/2024/01/Travelcarslogo.png" align="center" width="180" height="85"></td>
      </tr>
   </tbody>
</table>
<table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width:600px; border-collapse: collapse; display: block;
    margin-top: -5px !important;" width="600">
   <tr>
      <td>
         <div style="padding-bottom:25px; background-color:#;"><img src="https://travelcarsnz.com/wp-content/uploads/2024/07/welcome_image.png" style="height: 240px;max-height: 100%;width: 100%;object-fit: cover; max-width:100%; "></div>
      </td>
   </tr>
   <tr>
      <td style="position:relative !important;">
         <img src="https://travelcarsnz.com/wp-content/uploads/2024/07/icon.png" style="text-align:left;width: 20px;display:inline-block;position:relative !important;transform:rotate(42deg);top: -25px !important;left: 1px !important;max-width:100%;">
         <h2 class="background-imagess" style="margin: 0;line-height: 0.9;font-weight:bold;font-size: 50px; font-weight: 700; color:#fcb500; font-family: Montserrat; display:inline;">LIST YOUR CAR OR<br>CAMPERVAN</h2>
         <p style="padding: 20px 30px;color: #000;letter-spacing: normal;font-size: 16px; font-family: Montserrat;font-weight: 700;line-height: 1.2;"><img src="https://travelcarsnz.com/wp-content/uploads/2024/07/unnamed-2.png" style="width: 22px;vertical-align: middle;"> Use The Super Boost Option and Reach 300,000+<br>Members Within the TCNZ Network!</p>
         <a href="https://travelcarsnz.com/panel/?action=create" style="background: rgb(252, 181, 0);transform-origin: 0px 0px;padding: 8px 20px;display: inline-block;border-radius: 16px;letter-spacing: 2.3px;font-size: 16px;color: #000;font-weight: 600;margin: 12px 0 25px; font-family: Montserrat; text-decoration: none!important;">SELL IT NOW!</a>
      </td>
   </tr>
   <tr style="padding:0 40px 30px; display:inline-block;">
      <td style="width: 33.33%;padding: 0 10px;">
         <img src="https://travelcarsnz.com/wp-content/uploads/2024/07/img1.png"  style="width: 200px;border-radius: 20px;height: 120px;object-fit: cover; max-width:100%;">
         <h3 style="margin: 0;font-size: 16px;text-transform: uppercase;line-height: 1.3; font-family: Montserrat;">campervans</h3>
         <a href="https://travelcarsnz.com/search/?type=campervans" style="background: rgb(252, 181, 0);transform-origin: 0px 0px;padding: 4px 16px;display: inline-block;border-radius: 16px;font-size: 12px;color: #000;font-weight: 600;margin: 8px; font-family: Montserrat; text-decoration: none!important; "><b>SEE MORE</b></a>
      </td>
      <td style="width: 33.33%; padding: 0 10px;">
         <img src="https://travelcarsnz.com/wp-content/uploads/2024/07/img2.png" style="width: 200px;border-radius: 20px;height: 120px;object-fit: cover; max-width:100%;">
         <h3 style="margin: 0;font-size: 16px;text-transform: uppercase;line-height: 1.3; font-family: Montserrat;" >MOTORHOMES</h3>
         <a href="https://travelcarsnz.com/search/?type=motorhomes" style="background: rgb(252, 181, 0);transform-origin: 0px 0px;padding: 4px 16px;display: inline-block;border-radius: 16px;font-size: 12px;color: #000;font-weight: 600;margin: 8px; font-family: Montserrat; text-decoration: none!important;"><b>SEE MORE</b></a>
      </td>
      <td style="width: 33.33%;padding: 0 10px;">
         <img src="https://travelcarsnz.com/wp-content/uploads/2024/07/img3.png" style="width: 200px;border-radius: 20px;height: 120px;object-fit: cover; max-width:100%;">
         <h3 style="margin: 0;font-size: 16px;text-transform: uppercase;line-height: 1.3; font-family: Montserrat;">RENTALS</h3>
         <a href="https://travelcarsnz.com/rentals/" style="background: rgb(252, 181, 0);transform-origin: 0px 0px;padding: 4px 16px;display: inline-block;border-radius: 16px;font-size: 12px;color: #000;font-weight: 600;margin: 8px; font-family: Montserrat; text-decoration: none!important;"><b>SEE MORE</b></a>
      </td>
   </tr>
</table>
<table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #fcb500;" width="600">
   <tbody>
      <tr style="background-color: #fcb500;">
         <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 5px; padding-bottom: 5px;" width="596">
            <p style="font-size: 19px;  Arial, sans-serif; font-weight: 400; text-decoration: none; color: rgb(255, 255, 255);  letter-spacing: -0.02em;"><a style="text-decoration: none; color:#fff" href="mailto:INFO@TRAVELCARSNZ.COM">INFO@TRAVELCARSNZ.COM</a></p>
            <p style="letter-spacing:normal;font-size: 12px; font-weight: 800; font-weight: 300;color: #fff; font-size: 16px;  margin:0; font-family: Montserrat; text-decoration: none!important;">Copyright © All rights reserved.</p>
         </td>
      </tr>
   </tbody>
</table>
<table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px;" width="600">
   <tbody>
      <tr>
         <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px;" width="596">
            <p style="font-size: 12px; line-height: 12px;  Arial, sans-serif; font-weight: normal; text-decoration: none; color: #000000;">Not wanting to receive these emails?</p>
            <p style="font-size: 12px;  padding: 10px; line-height: 12px;  Arial, sans-serif; font-weight: normal; text-decoration: none; color: #000000;">You can <a style="text-decoration: underline; color: #000000;" href="insert-unsubscribe-link-here"><u> unsubscribe here</u></a></p>
         </td>
      </tr>
   </tbody>
</table>';

        $this->sendNotification($user->getMail(), $title, $message);
    }

    /**
     * @param User $user
     */
    public function mailConfirmation(User $user)
    {
        $notification = Notification::getByKey(Notification::MAIL_CONFIRMATION);
        if (!$notification) {
            return;
        }

        $confirmationUrl = $user->getConfirmationUrl();

        $title = str_replace('{userDisplayName}', $user->getName(), $notification->title);

        $message = str_replace(
            ['{userDisplayName}', '{confirmationLink}'],
            [$user->getName(), '<a href="' . $confirmationUrl . '">' . $confirmationUrl . '</a>'],
            $notification->message
        );

        $this->sendNotification($user->getMail(), $title, $message);
    }

    /**
     * @param User $user
     * @param string $link
     */
    public function resetPassword(User $user, $link)
    {
        $notification = Notification::getByKey(Notification::RESET_PASSWORD);
        if (!$notification) {
            return;
        }

        $title = str_replace('{userDisplayName}', $user->getName(), $notification->title);
        $message = str_replace(
            ['{userDisplayName}', '{resetPasswordLink}'],
            [$user->getName(), '<a href="' . $link . '">' . $link . '</a>']
            , $notification->message
        );

        $this->sendNotification($user->getMail(), $title, $message);
    }

    /**
     * @param Car $car
     */
    public function carApproved(Car $car)
    {
        $notification = Notification::getByKey(Notification::CAR_APPROVED);
        if (!$notification || !$notification->isEnabled()) {
            return;
        }

        $user = $car->getUser();
        if (!$user) {
            return;
        }

        $search = ['{userDisplayName}', '{listingLink}', '{listingName}'];
        $replace = [$user->getName(), '<a href="' . $car->getUrl() . '">' . $car->getUrl() . '</a>', $car->getName()];

        $title = str_replace($search, $replace, $notification->title);
        $message = str_replace($search, $replace, $notification->message);

        $this->sendNotification($user->getMail(), $title, $message);
    }

    /**
     * @param Car $car
     * @noinspection DuplicatedCode
     */
    public function carDeclined(Car $car)
    {
        $notification = Notification::getByKey(Notification::CAR_DECLINED);
        if (!$notification || !$notification->isEnabled()) {
            return;
        }

        $user = $car->getUser();
        if (!$user) {
            return;
        }

        $search = ['{userDisplayName}', '{listingName}'];
        $replace = [$user->getName(), $car->getName()];

        $title = str_replace($search, $replace, $notification->title);
        $message = str_replace($search, $replace, $notification->message);

        $this->sendNotification($user->getMail(), $title, $message);
    }

    /**
     * @param Car $car
     * @noinspection DuplicatedCode
     */
    public function carPending(Car $car)
    {
        $notification = Notification::getByKey(Notification::CAR_PENDING);
        if (!$notification || !$notification->isEnabled()) {
            return;
        }

        $user = $car->getUser();
        if (!$user) {
            return;
        }

        $search = ['{userDisplayName}', '{listingName}'];
        $replace = [$user->getName(), $car->getName()];

        $title = str_replace($search, $replace, $notification->title);
        $message = str_replace($search, $replace, $notification->message);

        $this->sendNotification($user->getMail(), $title, $message);
    }

    /**
     * @param User $user
     * @return string
     */
    private function getUserDisplayNameWithLink(User $user)
    {
        if ($user->isPrivateRole()) {
            return $user->getName();
        }

        return '<a href="' . $user->getUrl() . '">' . $user->getName() . '</a>';
    }

    /**
     * @param Car $car
     */
    public function newCarPending(Car $car)
    {
        $notification = Notification::getByKey(Notification::NEW_CAR_PENDING);
        if (!$notification || !$notification->isEnabled()) {
            return;
        }

        $user = $car->getUser();
        if (!$user) {
            return;
        }

        $package = $car->getPendingPackage();

        $search = [
            '{userDisplayName}',
            '{userDisplayNameWithLink}',
            '{listingName}',
            '{expire}',
            '{featuredExpire}'
        ];

        $replace = [
            $user->getName(),
            $this->getUserDisplayNameWithLink($user),
            $car->getName(),
            $package ? $package->getExpire() : '',
            $package ? $package->getFeaturedExpire() : '',
        ];

        $title = str_replace($search, $replace, $notification->title);
        $message = str_replace($search, $replace, $notification->message);

        $this->sendNotification(get_bloginfo('admin_email'), $title, $message);
    }

    public function save()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_POST['notifications'])) {
            $this->saveNotifications($_POST['notifications']);
        }

        vehicaApp('settings_config')->update($_POST, Setting::getNotificationSettings());

        wp_redirect(admin_url('admin.php?page=vehica_panel_notifications'));
        exit;
    }

    /**
     * @param $title
     * @param $rawMessage
     * @param $mail
     * @noinspection HtmlRequiredLangAttribute
     */
    private function sendNotification($mail, $title, $rawMessage)
    {
        if (is_rtl()) {
            $message = '<html ' . get_language_attributes() . '><body style="text-align:right; direction:rtl;">' . $rawMessage . '</body></html>';
        } else {
            $message = '<html ' . get_language_attributes() . '><body>' . $rawMessage . '</body></html>';
        }

        //$message = apply_filters('vehica/notifications/message', $message, $rawMessage);

        wp_mail($mail, $title, ($message), [
            'Content-Type: text/html; charset=UTF-8'
        ]);
    }

    /**
     * @param array $notifications
     */
    private function saveNotifications($notifications)
    {
        update_option('vehica_notifications', stripslashes_deep($notifications));
    }

}