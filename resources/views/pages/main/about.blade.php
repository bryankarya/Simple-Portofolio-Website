<section id="about" class="container my-5">
    <div class="resume-section-content">
        <h1 class="mb-0">
            {{ e($about->first_name ?? 'First Name') }}
            <span class="text-primary">{{ e($about->last_name ?? 'Last Name') }}</span>
        </h1>
        <div class="subheading mb-5">
            {{ e($about->address ?? 'Address not available') }} ·
            {{ e($about->phone ?? 'Phone not available') }} ·

            <a href="mailto:{{ e($about->email ?? '') }}">
                {{ e($about->email ?? 'Email not available') }}
            </a>
        </div>
        <p class="lead mb-5">
            {{ e($about->bio ?? 'No biography available.') }}
        </p>
        @if (!empty($about->social_links))
            <div class="social-icons mb-5">
                @foreach ($about->social_links as $platform => $url)
                    <a class="social-icon" href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-{{ $platform }}"></i>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    <hr class="m-0 mt-1" />
</section>
