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

    $('.component-register-form').on('submit', function (event) {
        event.preventDefault();

        const $form = $(this);
        const $submit = $form.find('[type="submit"]');
        const $loader = $('.component-auth-loading');

        $submit.prop('disabled', true);

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: {
                Accept: 'application/json',
            },

            success(response) {
                $loader.removeClass('d-none');

                window.location.href = response.redirect;
            },

            error(xhr) {
                $submit.prop('disabled', false);

                if (xhr.status !== 422) {
                    return;
                }

                const errors = xhr.responseJSON.errors;

                $form.find('.is-invalid').removeClass('is-invalid');
                $form.find('.component-validation-error').remove();

                Object.entries(errors).forEach(([field, messages]) => {
                    const $input = $form.find(`[name="${field}"]`);

                    $input.addClass('is-invalid');

                    $input
                        .closest('div')
                        .append(`
                            <div class="invalid-feedback d-block component-validation-error">
                                ${messages[0]}
                            </div>
                        `);
                });
            },
        });
    });
});
