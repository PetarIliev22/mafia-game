@if (session('success'))
    <div class="component-flash-message component-flash-success">
        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>

        <span>
            {{ session('success') }}
        </span>
    </div>
@endif

@if (session('error'))
    <div class="component-flash-message component-flash-error">
        <i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i>

        <span>
            {{ session('error') }}
        </span>
    </div>
@endif