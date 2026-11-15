<x-layout>
    <x-slot:title>Catégorie introuvable - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold text-gray-900">Catégorie introuvable</h1>
    <p class="mt-2 mb-8 text-gray-600">Cette catégorie n'existe pas ou a été supprimée.</p>

    <x-alert type="info" title="Que faire ?" class="max-w-2xl">
        Vérifiez l'adresse, ou parcourez les catégories disponibles ci-dessous.
    </x-alert>

    @if (($categories ?? collect())->isNotEmpty())
        <section class="mt-8 border-t border-gray-200 pt-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Catégories disponibles</h2>
            <ul class="flex flex-wrap gap-2">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('posts.category', $category) }}" class="rounded-full bg-indigo-50 px-3 py-1 text-sm font-medium text-indigo-700 hover:bg-indigo-100">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif

    <p class="mt-6">
        <a href="{{ route('home') }}" class="font-medium text-indigo-600 hover:underline">Retour à l'accueil</a>
    </p>
</x-layout>
