<x-guest-layout>
    <div class=" flex justify-center align-center">
        <div class="grid grid-cols-4 gap-4">
            <div class="w-48 h-56">
                @foreach($pets as $pet)
                    <div class="pet-item">
                        <h2>{{ $pet->pet_name }}</h2>
                        <p>Type: {{ $pet->pet_type }}</p>
                        <p>Breed: {{ $pet->breed }}</p>
                        <img src="{{ asset('storage/images/' . $pet->dropzone_file) }}" alt="{{ $pet->pet_name }}" />
                    </div>
                @endforeach
            </div>            
        </div>
    </div>
</x-guest-layout>

{{-- dito pet page. Ako na bahala dito --}}