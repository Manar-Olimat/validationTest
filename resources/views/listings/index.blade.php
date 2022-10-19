<x-layout>

@include('partials._hero')
@include('partials._search')
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
@foreach ($Listings as $item)
 <x-listing-card :item="$item"/> 
@endforeach

</div>
{{-- //show pagination links --}}
<div class="mt-6 p-4">
    {{$Listings->links()}}
</div>
</x-layout>