<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-white bg-red-500 hover:bg-red-700  text-center py-2 font-bold rounded-lg']) }}>
    {{ $slot }}
</button>
