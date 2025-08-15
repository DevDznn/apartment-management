@props([
    'label' => '',
    'id' => '',
    'rows' => 4,
    'placeholder' => ''
])

<div>
    @if($label)
        <label for="{{ $id }}" class="block mb-1 font-medium text-[#021908]">{{ $label }}</label>
    @endif
    <textarea
        id="{{ $id }}"
        name="{{ $id }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-[#BBCB2F] focus:border-[#021908] transition"
    ></textarea>
</div>
