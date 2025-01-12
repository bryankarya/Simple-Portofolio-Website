<section id="certification" class="container my-5">
    <div class="resume-section-content">
        <h2 class="mb-5">Certifications</h2>

        @foreach ($certifications as $certification)
        <!-- Certification Entry -->
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
                <h3 class="mb-0">{{ $certification->title }}</h3>
                <div class="subheading mb-3">{{ $certification->issuer }}</div>
                <p>{{ $certification->description }}</p>
            </div>
            <div class="flex-shrink-0">
                <span class="text-primary">
                    {{ \Carbon\Carbon::parse($certification->issue_date)->format('F Y') }} -
                    {{ $certification->expiry_date ? \Carbon\Carbon::parse($certification->expiry_date)->format('F Y') : 'No Expiry' }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
    <hr class="m-0" />
</section>
