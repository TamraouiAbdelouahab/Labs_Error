<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Ajouter un Article</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST">
        

            <div class="mb-4">
                <label for="title" class="block font-medium">Titre</label>
                <input type="text" name="title" id="title"
                       class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-300"
                       value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-medium">Contenu</label>
                <textarea name="content" id="content"
                          class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Ajouter l'article
            </button>
        </form>
    </div>
</body>
</html>
