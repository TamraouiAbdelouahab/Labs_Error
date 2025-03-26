<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Liste des Articles</h2>

        <a href="{{ route('articles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Ajouter un article
        </a>

        <div class="mt-6">
            @if($articles->isEmpty())
                <p class="text-gray-600">Aucun article trouvé.</p>
            @else
                <ul class="space-y-4">
                    @foreach($articles as $article)
                        <li class="border p-4 rounded shadow">
                            <h3 class="text-xl font-bold">{{ $article->title }}</h3>
                            <p class="text-gray-700">{{ Str::limit($article->content, 100) }}</p>
                            <p class="text-gray-500 text-sm">Publié le {{ $article->created_at->format('d/m/Y') }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>
</html>
