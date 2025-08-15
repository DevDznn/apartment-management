@props([
    'label' => '',
    'id' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'multiple' => false
])

<div>
    @if($label)
        <label for="{{ $id }}" class="block mb-1 font-medium text-[#021908]">{{ $label }}</label>
    @endif
    <input 
        type="{{ $type }}" 
        name="{{ $id }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}" 
        value="{{ $value }}" 
        @if($multiple) multiple @endif
        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-[#BBCB2F] focus:border-[#021908] transition"
    />
</div>
