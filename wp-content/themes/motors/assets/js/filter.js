"use strict";

(function ($) {

    $(document).on('click', '.archive-listing-page .stm-blog-pagination a', function(){
        if($('.archive-listing-page').length) {
            $('html, body').animate({
                scrollTop: $(".archive-listing-page").offset().top
            }, 500);
        }
    });

    STMListings.Filter.prototype.ajaxBefore = function () {
        /*Add filter preloader*/
        $('.stm-ajax-row').addClass('stm-loading');

        /*Add selects preloader*/
        $('.classic-filter-row .filter-sidebar .select2-container--default .select2-selection--single .select2-selection__arrow b').addClass('stm-preloader');
        $('.mobile-search-filter .filter-sidebar .select2-container--default .select2-selection--single .select2-selection__arrow b').addClass('stm-preloader');
        $('.mobile-search-filter .filter-sidebar .select2-container--default .selection').addClass('stm-overlay');
        $('.search-filter-form .active .mobile .filter-sidebar .select2-container--default .selection').addClass('stm-overlay');
    };

    STMListings.Filter.prototype.ajaxSuccess = function (res) {

        
        /*Disable useless selects*/
        this.disableOptions(res);

        /*Append new html*/
        this.appendData(res);

		if (res.url) {
			this.pushState(res.url);
		}

        /*Reinit js functions*/
        this.reInitJs();
        /*Remove preloader*/
        $('.stm-ajax-row').removeClass('stm-loading');
    
        /*Remove select preloaders*/
        $('.classic-filter-row .filter-sidebar .select2-container--default .select2-selection--single .select2-selection__arrow b').removeClass('stm-preloader');
        $('.classic-filter-row .filter-sidebar select').prop("disabled", false);
    
    };

    STMListings.Filter.prototype.disableOptions = function (res) {
        var form = this.form;
        if (typeof res.options != 'undefined') {
            $.each(res.options, function (key, options) {
                var value = $('select[name=' + key + ']', form).val();
                $('select[name=' + key + '] > option', form).each(function () {
                    var slug = $(this).val();
                    if (options.hasOwnProperty(slug) && value !== slug) {
                        $(this).prop('disabled', options[slug].disabled);
                    }
                });
            });
        }

        $('select', form).select2('destroy');
        $('select', form).select2(
            {
                dropdownParent: $('body'),
            }
        );

		$('.stm-select-sorting select').select2('destroy');
		$('.stm-select-sorting select').html('');
		$('.stm-select-sorting select').select2({
			data: res.sorts,
            dropdownParent: $('body'),
        });

		if($('body').hasClass('stm-template-aircrafts')) {
            $.each(res.filter_links, function (key, link) {
                $.each(res.options[link['slug']], function (key, linkOption) {
                    if(key) $('label[data-taxonomy="stm-iwf-'+link['slug']+'"] span[data-slug="stm-iwf-'+key+'"]').text('('+linkOption['count']+')');
                })
            })
        }

		$.each(res.filter_links, function (key, link) {
			$.each(res.options[link['slug']], function (key, linkOption) {
                if(key)
				    $('#stm-filter-link-'+link['slug']+' li[data-value="'+key+'"] span').text('('+linkOption['count']+')');
            })
        })

    };

    STMListings.Filter.prototype.appendData = function (data) {
        this.getTarget().html(data.html);

        /*Listing functions*/
        if ($('.stm-listing-directory-title .title').length > 0) {
            if (typeof(data.listing_title) !== 'undefined') {
                $('.stm-listing-directory-title .title').text(data.listing_title);
            }

            if (typeof(data.total) !== 'undefined') {
                $('.stm-listing-directory-title .total > span').text(data.total);
            }
        }

        if($('body').hasClass('stm-template-motorcycle')) {
            $('.stm-car-listing-sort-units .stm-listing-directory-title .stm-listing-directory-total-matches > span').text(data.total);
        }
    };

    STMListings.Filter.prototype.reInitJs = function () {
        //stButtons.locateElements();
        $("img.lazy").lazyload();
        $('.stm-tooltip-link, div[data-toggle="tooltip"]').tooltip();
        STMListings.initVideoIFrame();

        $('.stm-shareble').on({
            mouseenter: function () {
                $(this).parent().find('.stm-a2a-popup').addClass('stm-a2a-popup-active');
            },
            mouseleave: function () {
                $(this).parent().find('.stm-a2a-popup').removeClass('stm-a2a-popup-active');
            }
        });

        $(".a2a_dd").each(function() {
            a2a.init('page');
        });

        if ($('body').hasClass('logged-in')) {
            $.getJSON(ajaxurl, {action: 'stm_ajax_get_favourites', security: stm_security_nonce}, function (data) {
                window.stm_favourites.ids = data;
                window.stm_favourites.activateLinks();
            });
        }

        window.stm_compare.activateLinks();

		//Default plugins
        $("select:not(.hide)").each(function () {
			var selectElement = $(this);
            selectElement.select2({
                
                
                dropdownParent: $('body'),
            });
        });
	};

    $(document).on('click', '#stm-classic-filter-submit', function (e) {
        if ($(this).hasClass('stm-classic-filter-submit-boats')) {
            e.preventDefault();
            stm_disable_rest_filters($(this), 'listings-items');
        }
    });
    
    $(document).on('click', '#show-car-btn-mobile', function (e) {
        if ($(this).hasClass('show-car-btn')) {
            e.preventDefault();
        }
    });

    // Listing price
    $(document).on('slidestop', '.stm-filter-listing-directory-price .stm-price-range', function (event, ui) {
        $(this).closest('form').trigger('submit');
    });


    //Checkboxed area listing trigger
    $(document).on('click', '.stm-ajax-checkbox-button .button, .stm-ajax-checkbox-instant .stm-option-label input', function (e) {

        if ($(this)[0].className == 'button') {
            e.preventDefault();
        }

        $(this).closest('form').trigger('submit');

    });

    $(document).on('click', '.stm-view-by a', function (e) {

        if(!$(this).hasClass('stm-modern-view')) {
            if(!$('body').hasClass('author')) e.preventDefault();

            var viewType = $(this).data('view');

            $('.stm-view-by a').removeClass('active');
            $(this).addClass('active');

            $('#stm_view_type').val(viewType).closest('form').trigger('submit');
        }
    });

    /*Remove badge*/
    $(document).on('click', 'ul.stm-filter-chosen-units-list li > i', function () {
        var stmUrl = $(this).data('url');
        var stmFilter = $('form[data-trigger=filter]').data('Filter');
        stmFilter.performAjax(stmUrl);

        /*Reset field*/
        var stmType = $(this).data('type');
        var stmSlug = $(this).data('slug');

        $('input[name="' + stmSlug + '[]"]:checked').each( function() {
            $('input[name="' + stmSlug + '[]"]:checked').parent().removeClass("checked");
            $('input[name="' + stmSlug + '[]"]:checked').prop('checked', false);
        } );

        if(stmType == 'select') {
            $('select[name="' + stmSlug +  '"]').val('');
            $('select[name="' + stmSlug +  '"]').find('option').prop('disabled', false);
            $('select[name="' + stmSlug +  '"]').select2('destroy').select2().select2('val', '');
        }
    });

    $(document).on('click', '.stm_boats_view_by ul li a', function (e) {
        e.preventDefault();
        var stmUrl = $(this).attr('href');
        var stmFilter = $('form[data-trigger=filter]').data('Filter');
        stmFilter.performAjax(stmUrl);

        $('.stm_boats_view_by ul li').removeClass('active');
        $(this).closest('li').addClass('active');
    });

    /*Location*/
    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(document).on('keyup', '#ca_location_listing_filter', function () {
        delay(function () {
            $('#ca_location_listing_filter').closest('form').trigger('submit');
        }, 500);
    });

    $(document).on('change', '#ca_location_listing_filter', function () {
        delay(function () {

            var address_search = $('#ca_location_listing_filter').val();
			var geocoder = new google.maps.Geocoder();

			geocoder.geocode({'address': address_search}, function (results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					var lat = results[0].geometry.location.lat();
					var lng = results[0].geometry.location.lng();

					$('#ca_location_listing_filter').closest('.stm-location-search-unit').find('input[name="stm_lat"]').val(lat);
					$('#ca_location_listing_filter').closest('.stm-location-search-unit').find('input[name="stm_lng"]').val(lng);

				    $('input[name="sort_order"]').val('distance_nearby');
					$('#ca_location_listing_filter').closest('form').trigger('submit');
				} else if(status === google.maps.GeocoderStatus.REQUEST_DENIED) {
                    $('#ca_location_listing_filter').val('');
                    $('#ca_location_listing_filter').closest('.stm-location-search-unit').find('input[name="stm_lat"]').val(0);
                    $('#ca_location_listing_filter').closest('.stm-location-search-unit').find('input[name="stm_lng"]').val(0);

                    $('#ca_location_listing_filter').closest('form').trigger('submit');
                }
			});
            
        }, 500);
    });

    /*Boats Filter res*/
    $(document).on('change', 'body.stm-template-boats .archive-listing-page form input, body.stm-template-boats .archive-listing-page form select', function () {
        stm_disable_rest_filters($(this), 'listings-binding');
    });
    
    
    if ($('.stm-checkbox-submit').length) {
        $(document).on('change', '.classic-filter-row form.search-filter-form.mobile input[type=text], .classic-filter-row form.search-filter-form.mobile select', function () {
            stm_disable_rest_filters($(this), 'listings-binding');
        });
    } else {
        $(document).on('change', '.classic-filter-row form.search-filter-form.mobile input, .classic-filter-row form.search-filter-form.mobile select', function () {
            stm_disable_rest_filters($(this), 'listings-binding');
        });
    }
    
    $(document).on('click', '.search-filter-form.mobile .stm-checkbox-submit', function () {
        stm_disable_rest_filters($(this), 'listings-binding');
    });
    
    if ($('.stm-checkbox-submit').length) {
        $(document).on('change', '.mobile-search-filter input[type=text], .mobile-search-filter select', function () {
            stm_disable_rest_filters($(this), 'listings-binding');
        });
    } else {
        $(document).on('change', '.mobile-search-filter input, .mobile-search-filter select', function () {
            stm_disable_rest_filters($(this), 'listings-binding');
        });
    }
    
    $(document).on('click', '.mobile-search-filter .stm-checkbox-submit', function () {
        stm_disable_rest_filters($(this), 'listings-binding');
    });
    
    $(document).on('slidestop', '.stm-filter-sidebar-boats .stm-filter-type-slider', function (event, ui) {
        stm_disable_rest_filters($(this), 'listings-binding');
    });

    $(document).on('click', '.stm_motorcycle_pp a', function(e){
        e.preventDefault();
        e.stopPropagation();
    });

    function stm_disable_rest_filters($_this, action) {
        var $_form = $_this.closest('form');

        var data = [],
            url = $_form.attr('action'),
            sign = url.indexOf('?') < 0 ? '?' : '&';

        $.each($_form.serializeArray(), function (i, field) {
            if (field.value != '') {
                data.push(field.name + '=' + field.value)
            }
        });

        url = url + sign + data.join('&');

        $.ajax({
            url: url,
            dataType: 'json',
            context: this,
            data: '&ajax_action=' + action,
            beforeSend: function () {
                if (action == 'listings-items') {
                    $('.stm-ajax-row').addClass('stm-loading');
                } else {
                    $('.classic-filter-row .filter-sidebar .select2-container--default .select2-selection--single .select2-selection__arrow b').addClass('stm-preloader');
                    $('.mobile-search-filter .filter-sidebar .select2-container--default .select2-selection--single .select2-selection__arrow b').addClass('stm-preloader');
                    $('.mobile-search-filter .filter-sidebar .select2-container--default .selection').addClass('stm-overlay');
                    $('.search-filter-form .filter-sidebar .select2-container--default .selection').addClass('stm-overlay');
                }
            },
            success: function (res) {
                if (action == 'listings-items') {
                    $('.stm-ajax-row').removeClass('stm-loading');
                    $('#listings-result').html(res.html);
                    $("img.lazy").lazyload();
                    $('.stm-tooltip-link, div[data-toggle="tooltip"]').tooltip();

                    window.history.pushState('', '', decodeURI(url));
                } else {
                    /*Remove select preloaders*/
                    $('.classic-filter-row .filter-sidebar .select2-container--default .select2-selection--single .select2-selection__arrow b').removeClass('stm-preloader');
                    $('.classic-filter-row .filter-sidebar select').prop("disabled", false);
                    
                    /*Disable options*/
                    if (typeof res.options != 'undefined') {
                        $.each(res.options, function (key, options) {
                            $('select[name=' + key + '] > option', $_form).each(function () {
                                var slug = $(this).val();
                                if (options.hasOwnProperty(slug)) {
                                    $(this).prop('disabled', options[slug].disabled);
                                }
                            });
                        });
                    }

                    $('select', $_form).select2('destroy');
                    $('select', $_form).select2(
                        {
                            dropdownParent: $('body'),
                        }
                    );

                    /*Change total*/
                    $('.stm-filter-sidebar-boats #stm-classic-filter-submit span').text(res.total);
                    $('.search-filter-form #show-car-btn-mobile span').text(res.total);
                    $('.mobile-search-filter #show-car-btn-mobile span').text(res.total);
                }
            }
        });
    }

    // Reset fields
    STMListings.resetFields = function() {
        $(document).on('reset', 'select', function(e){
            $(this).val('');
            $(this).find('option').prop('disabled', false);
            $(this).select2('destroy').select2().select2('val', '');
        });
    };
    
    //Mobile search filter
    $(document).ready(function(){
        $('.mobile-search-btn').click(function(){
            $('.mobile-search-filter').addClass('active');
            $('.mobile-overlay').addClass('active').insertBefore('#wrapper');
            $('html').addClass('mobile-overflow-hidden');
            $('body').addClass('mobile-search-filter-opened');
        });
        $('.close-btn').click(function(){
            $('.mobile-search-filter').removeClass('active');
            $('.mobile-overlay').removeClass('active');
            $('html').removeClass('mobile-overflow-hidden');
            $('body').removeClass('mobile-search-filter-opened');
        });
        $('.mobile-overlay').click(function(){
            $('.mobile-overlay').removeClass('active');
            $('.mobile-search-filter').removeClass('active');
            $('html').removeClass('mobile-overflow-hidden');
            $('body').removeClass('mobile-search-filter-opened');
        });
        $('.show-car-btn').click(function(){
            $('.mobile-overlay').removeClass('active');
            $('.mobile-search-filter').removeClass('active');
            $('html').removeClass('mobile-overflow-hidden');
            $('body').removeClass('mobile-search-filter-opened');
        });
    });
    $(document).ready(function() {
        const classicFilterRow = $('.mobile-search-filter');
        const footer = $('footer');

        function checkScreenSize() {
            if ($(window).width() < 1025) {
                classicFilterRow.detach().appendTo(footer);
            } else {
                classicFilterRow.detach().appendTo('.container');
            }
        }

        checkScreenSize();

        $(window).resize(checkScreenSize);
    });

})(jQuery);

function stm_get_price_view(price, currency, currencyPos, priceDel) {
    return price;
}