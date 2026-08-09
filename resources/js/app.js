import 'bootstrap/js/dist/tab';
import jQuery from 'jquery';

jQuery(function ($) {
    $('.component-auth-avatar-wrapper').each(function () {
        const $component = $(this);
        const $input = $component.find('.component-auth-avatar-input');
        const $preview = $component.find('.component-auth-avatar-preview');
        const $placeholder = $component.find('.component-auth-avatar-placeholder');

        $input.on('change', function () {
            const file = this.files[0];

            if (!file) {
                $preview.attr('src', '').addClass('d-none');
                $placeholder.removeClass('d-none');

                return;
            }

            $preview
                .attr('src', URL.createObjectURL(file))
                .removeClass('d-none');

            $placeholder.addClass('d-none');
        });
    });

    $('.component-auth-form').on('submit', function () {
        if (!this.checkValidity()) {
            return;
        }

        $('.component-auth-loading').removeClass('d-none');
        $(this).find('[type="submit"]').prop('disabled', true);
    });
});
