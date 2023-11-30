<x-guest-layout>
    <div class=" flex justify-center align-center">
        <div class="grid grid-cols-5 gap-24">
            @foreach($pets as $pet)
                <div class="object-cover h-72 w-52 p-2 border-black-100 border-2">
                    {{-- <h2>{{ $pet->pet_name }}</h2>
                    <p>Type: {{ $pet->pet_type }}</p>
                    <p>Breed: {{ $pet->breed }}</p> --}}
                    <img class="object-cover w-full h-full" src="{{ asset('storage/images/' . $pet->dropzone_file) }}" alt="{{ $pet->pet_name }}" />
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>

{{-- dito pet page. Ako na bahala dito --}}