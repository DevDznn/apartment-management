@props([
    'label' => '',
    'id' => '',
    'options' => [],
    'value' => ''
])

<div class="relative w-full">
    @if($label)
        <label for="{{ $id }}" class="block mb-1 font-medium text-[#021908]">{{ $label }}</label>
    @endif

    <div class="relative flex items-center">
        <select 
            id="{{ $id }}" 
            name="{{ $id }}" 
            class="w-full h-10 border border-gray-300 rounded-md appearance-none pl-3 pr-10 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] focus:border-[#021908] transition"
        >
            @foreach($options as $option)
                <option value="{{ $option }}" @if($option == $value) selected @endif>{{ $option }}</option>
            @endforeach
        </select>

        <!-- Arrow Icon -->
        <div class="absolute right-2 pointer-events-none flex items-center justify-center h-full">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>
</div>
