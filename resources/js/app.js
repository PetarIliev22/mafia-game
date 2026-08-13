import AOS from 'aos';
import 'aos/dist/aos.css';
import jQuery from 'jquery';

jQuery(function ($) {
    AOS.init({
        duration: 500,
        easing: 'ease-out',
        once: false,
    });

    function openPage(target) {
        const $target = $(target);

        $('.page-view').addClass('d-none');

        $target
            .removeClass('d-none')
            .removeClass('aos-animate');

        // Force browser reflow
        $target[0]?.offsetHeight;

        requestAnimationFrame(() => {
            AOS.refreshHard();
        });

        switch (target) {
            case '#profile-page':
                $('.component-header-player').addClass('d-none');
                $('.component-header-back').removeClass('d-none');
                break;

            default:
                $('.component-header-player').removeClass('d-none');
                $('.component-header-back').addClass('d-none');
                break;
        }
    }

    $('[data-page-target]').on('click', function (event) {
        event.preventDefault();

        openPage($(this).attr('data-page-target'));
    });

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

    $('.component-auth-form').on('submit', function (event) {
        if (!this.checkValidity()) {
            event.preventDefault();
            this.reportValidity();
            return;
        }

        event.preventDefault();

        const form = this;
        const $form = $(form);

        $('.component-auth-loading').removeClass('d-none');
        $form.find('[type="submit"]').prop('disabled', true);

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                form.submit();
            });
        });
    });

    $('.component-password-toggle').on('click', function () {
        const $input = $(this).siblings('input');
        const visible = $input.attr('type') === 'text';

        $input.attr('type', visible ? 'password' : 'text');
        $(this).find('i').toggleClass('bi-eye bi-eye-slash');
    });

    $('.component-password-input').on('input', function () {
        const value = $(this).val();
        const $group = $(this).closest('.component-password-group');
        const $strength = $group.find('.component-password-strength');
        const $bar = $group.find('.component-password-strength-bar');
        const $text = $group.find('.component-password-strength-text');

        if (value === '') {
            $strength.addClass('d-none');
            $text.addClass('d-none');

            return;
        }

        $strength.removeClass('d-none');
        $text.removeClass('d-none');

        let score = 0;

        if (value.length >= 8) score++;
        if (/[A-Z]/.test(value)) score++;
        if (/[a-z]/.test(value)) score++;
        if (/[0-9]/.test(value)) score++;
        if (/[^A-Za-z0-9]/.test(value)) score++;

        const states = [
            { width: '20%', color: '#ff453a', text: 'Много слаба' },
            { width: '20%', color: '#ff453a', text: 'Много слаба' },
            { width: '40%', color: '#ff9f0a', text: 'Слаба' },
            { width: '60%', color: '#ffd60a', text: 'Средна' },
            { width: '80%', color: '#32d74b', text: 'Добра' },
            { width: '100%', color: '#30d158', text: 'Силна парола' },
        ];

        const state = states[score];

        $bar.css({
            width: state.width,
            backgroundColor: state.color,
        });

        $text.text(state.text);
    });
});
