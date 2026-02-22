<x-layout>
    @foreach ($posts as $post )
        <x-post :post="$post"/>
    @endforeach
    
</x-layout>