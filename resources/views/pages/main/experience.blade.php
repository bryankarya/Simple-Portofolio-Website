<section id="experience" class="container my-5">
    <div class="resume-section-content">
        <h2 class="mb-5">Experience</h2>

        @foreach ($experiences as $experience)
        <!-- Experience Entry -->
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
                <h3 class="mb-0">{{ $experience->role }}</h3>
                <div class="subheading mb-3">{{ $experience->company_name }}</div>
                <p>{{ $experience->description }}</p>
            </div>
            <div class="flex-shrink-0">
                <span class="text-primary">
                    {{ \Carbon\Carbon::parse($experience->start_date)->format('F Y') }} - 
                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('F Y') : 'Present' }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
    <hr class="m-0" />
</section>
