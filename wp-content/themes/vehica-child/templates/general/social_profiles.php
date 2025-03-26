<?php
    /* @var \Vehica\Widgets\General\SocialProfilesGeneralWidget $vehicaCurrentWidget */
    global $vehicaCurrentWidget;
?>
<div class="vehica-social-profiles">
    <?php if ($vehicaCurrentWidget->isStyleV1()) : ?>
        <div class="vehica-social-profiles__v1">
            
            <?php if (!empty(vehicaApp('facebook_url'))) : ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('facebook_url')); ?>"
                            title="<?php esc_attr_e('Facebook', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty(vehicaApp('twitter_url'))) : ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('twitter_url')); ?>"
                            title="<?php esc_attr_e('X', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty(vehicaApp('instagram_url'))) : ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('instagram_url')); ?>"
                            title="<?php esc_attr_e('Instagram', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
            <div class="vehica-social-icon">
                <a
                        href="https://www.pinterest.es/travelcarsnzlimited/"
                        title="<?php esc_attr_e('Pinterest', 'vehica'); ?>"
                        target="_blank"
                >
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C10.9716 20.5 9.98587 20.3174 9.07345 19.9828C9.64822 18.4359 10.2115 16.8847 10.7517 15.3255C11.326 15.7348 12.0668 16 13 16C14.935 16 16.9749 14.7247 17.4806 12.1961C18.1155 9.02148 15.5728 6 12 6C10.4972 6 9.01887 6.6037 7.91298 7.56243C6.80483 8.52311 6 9.90687 6 11.5C6 12.2746 6.23394 13.1378 6.79149 13.7057C7.17707 14.0919 7.82087 14.0933 8.20711 13.7071C8.59019 13.324 8.59749 12.7074 8.22899 12.3155C7.44315 11.3348 8.47852 9.71907 9.22306 9.07361C9.99585 8.40366 11.0175 8 12 8C14.4272 8 15.8845 9.97852 15.5194 11.8039C15.2165 13.3183 14.065 14 13 14C12.1821 14 11.7416 13.6547 11.4599 13.208C11.6137 12.7237 11.7454 12.2838 11.8387 11.9263C12.0311 11.1886 12.1473 10.3002 11.4839 9.7474C10.9908 9.33644 10.4087 9.42759 10.0528 9.60557C9.39135 9.93629 9 10.7099 9 11.5C9 11.9414 9.06873 12.6253 9.31675 13.3315C8.67824 15.258 7.98579 17.167 7.27924 19.0696C5.00045 17.5449 3.5 14.9477 3.5 12ZM12 1.5C6.20101 1.5 1.5 6.20101 1.5 12C1.5 17.799 6.20101 22.5 12 22.5C17.799 22.5 22.5 17.799 22.5 12C22.5 6.20101 17.799 1.5 12 1.5Z"
                                  fill="#fff"></path>
                        </g>
                    </svg>
                </a>
            </div>
            <?php
                if (is_page(1525)) {
                    global $whatsapp_show;
                    $whatsapp_show = isset($whatsapp_show) ? $whatsapp_show : true;
                    if ($whatsapp_show) {
                        ?>
                        <div class="vehica-social-icon">
                            <a
                                    href="https://api.whatsapp.com/send?phone=346447001335&text="
                                    title="<?php esc_attr_e('Whatsapp', 'vehica'); ?>"
                                    target="_blank"
                            >
                                <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="m15.271 13.21c.578.185 1.078.416 1.543.7l-.031-.018c.529.235.986.51 1.403.833l-.015-.011c.02.061.032.13.032.203 0 .011 0 .021-.001.032v-.001c-.015.429-.11.832-.271 1.199l.008-.021c-.231.463-.616.82-1.087 1.01l-.014.005c-.459.243-1.001.393-1.576.411h-.006c-1.1-.146-2.094-.484-2.988-.982l.043.022c-1.022-.468-1.895-1.083-2.636-1.829l-.001-.001c-.824-.857-1.579-1.795-2.248-2.794l-.047-.074c-.636-.829-1.041-1.866-1.1-2.995l-.001-.013v-.124c.032-.975.468-1.843 1.144-2.447l.003-.003c.207-.206.491-.335.805-.341h.001c.101.003.198.011.292.025l-.013-.002c.087.013.188.021.292.023h.003c.019-.002.04-.003.062-.003.13 0 .251.039.352.105l-.002-.001c.107.118.189.261.238.418l.002.008q.124.31.512 1.364c.135.314.267.701.373 1.099l.014.063c-.076.361-.268.668-.533.889l-.003.002q-.535.566-.535.72c.004.088.034.168.081.234l-.001-.001c.405.829.936 1.533 1.576 2.119l.005.005c.675.609 1.446 1.132 2.282 1.54l.059.026c.097.063.213.103.339.109h.002q.233 0 .838-.752t.804-.752zm-3.147 8.216h.022c1.357 0 2.647-.285 3.814-.799l-.061.024c2.356-.994 4.193-2.831 5.163-5.124l.024-.063c.49-1.113.775-2.411.775-3.775s-.285-2.662-.799-3.837l.024.062c-.994-2.356-2.831-4.193-5.124-5.163l-.063-.024c-1.113-.49-2.411-.775-3.775-.775s-2.662.285-3.837.799l.062-.024c-2.356.994-4.193 2.831-5.163 5.124l-.024.063c-.49 1.117-.775 2.419-.775 3.787 0 2.141.698 4.12 1.879 5.72l-.019-.026-1.225 3.613 3.752-1.194c1.49 1.01 3.327 1.612 5.305 1.612h.047zm0-21.426h.033c1.628 0 3.176.342 4.575.959l-.073-.029c2.825 1.197 5.028 3.4 6.196 6.149l.029.076c.588 1.337.93 2.896.93 4.535s-.342 3.198-.959 4.609l.029-.074c-1.197 2.825-3.4 5.028-6.149 6.196l-.076.029c-1.327.588-2.875.93-4.503.93-.011 0-.023 0-.034 0h.002c-.016 0-.034 0-.053 0-2.059 0-3.992-.541-5.664-1.488l.057.03-6.465 2.078 2.109-6.279c-1.051-1.714-1.674-3.789-1.674-6.01 0-1.646.342-3.212.959-4.631l-.029.075c1.197-2.825 3.4-5.028 6.149-6.196l.076-.029c1.327-.588 2.875-.93 4.503-.93h.033-.002z"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <?php
                        $whatsapp_show = false;
                    }
                }
            ?>
            <?php if (!empty(vehicaApp('youtube_url'))) : ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('youtube_url')); ?>"
                            title="<?php esc_attr_e('YouTube', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty(vehicaApp('linkedin_url'))) : ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('linkedin_url')); ?>"
                            title="<?php esc_attr_e('LinkedIn', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty(vehicaApp('tiktok_url'))): ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('tiktok_url')); ?>"
                            title="<?php esc_attr_e('TikTok', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if (!empty(vehicaApp('telegram_url'))): ?>
                <div class="vehica-social-icon">
                    <a
                            href="<?php echo esc_url(vehicaApp('telegram_url')); ?>"
                            title="<?php esc_attr_e('Telegram', 'vehica'); ?>"
                            target="_blank"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php elseif ($vehicaCurrentWidget->isStyleV2()) : ?>
        <div class="vehica-social-profiles__v2">
            <div class="vehica-social-profiles__v2__inner">
                <div class="vehica-social-profiles__v2__title">
                    <?php echo esc_html(vehicaApp('follow_us_string')); ?>
                </div>
                <?php if (!empty(vehicaApp('facebook_url'))) : ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('facebook_url')); ?>"
                                title="<?php esc_attr_e('Facebook', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty(vehicaApp('twitter_url'))) : ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('twitter_url')); ?>"
                                title="<?php esc_attr_e('X', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty(vehicaApp('instagram_url'))) : ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('instagram_url')); ?>"
                                title="<?php esc_attr_e('Instagram', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty(vehicaApp('youtube_url'))) : ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('youtube_url')); ?>"
                                title="<?php esc_attr_e('YouTube', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty(vehicaApp('linkedin_url'))) : ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('linkedin_url')); ?>"
                                title="<?php esc_attr_e('LinkedIn', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty(vehicaApp('tiktok_url'))): ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('tiktok_url')); ?>"
                                title="<?php esc_attr_e('TikTok', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty(vehicaApp('telegram_url'))): ?>
                    <div class="vehica-social-icon">
                        <a
                                href="<?php echo esc_url(vehicaApp('telegram_url')); ?>"
                                title="<?php esc_attr_e('Telegram', 'vehica'); ?>"
                                target="_blank"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            
            
            </div>
        </div>
    <?php endif; ?>
</div>