@extends('layouts.landlord')

@section('title', 'List a Property')

@section('content')
<div class="p-4 sm:p-6 md:p-8 min-h-screen bg-[#fffffd]">
    <h1 class="text-2xl md:text-3xl font-bold mb-6 text-[#021908]">List a Property</h1>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @include('landlord.partials.list-property-left')
        @include('landlord.partials.list-property-right')

        <!-- SUBMIT BUTTON -->
        <div class="md:col-span-2 flex justify-center mt-6">
            <button type="submit" class="bg-[#021908] text-white w-1/2 py-2 rounded-md hover:bg-opacity-90 transition">
                Submit Property
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
@include('landlord.partials.list-property-scripts')
@endsection
