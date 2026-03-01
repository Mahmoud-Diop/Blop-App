<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier l'article - Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-header />
    <div class="edit-container">
        <div class="edit-card">
            <div class="edit-header">
                <h1>Modifier l'article</h1>
                <a href="{{ url()->previous() }}" class="back-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    Retour
                </a>
            </div>

            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data"
                class="edit-form">
                @csrf
                @method('PUT')

                <!-- Titre -->
                <div class="form-group">
                    <label for="title">Titre de l'article</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                        class="form-input @error('title') is-invalid @enderror" placeholder="Entrez le titre..."
                        required>
                    @error('title')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contenu -->
                <div class="form-group">
                    <label for="content">Contenu</label>
                    <textarea id="content" name="content" rows="8" class="form-textarea @error('content') is-invalid @enderror"
                        placeholder="Écrivez votre article..." required>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Catégorie -->
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select id="category" name="category_id"
                        class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image actuelle -->
                @if ($post->image)
                    <div class="form-group">
                        <label>Image actuelle</label>
                        <div class="current-image">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            <div class="image-actions">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="remove_image" value="1">
                                    Supprimer cette image
                                </label>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Nouvelle image -->
                <div class="form-group">
                    <label for="image">Nouvelle image de couverture</label>
                    <div class="file-upload-area" onclick="document.getElementById('image').click()">
                        <input type="file" id="image" name="image" accept="image/*" style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="2.18" />
                            <path d="M7 2v20M17 2v20M2 12h20M2 7h5M2 17h5M17 17h5M17 7h5" />
                        </svg>
                        <span>Cliquez pour changer l'image</span>
                    </div>
                    <small class="file-hint">Laissez vide pour conserver l'image actuelle</small>
                    @error('image')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Boutons d'action -->
                <div class="form-actions">
                    <a href="{{ url()->previous() }}" class="btn-cancel">
                        Annuler
                    </a>
                    <button type="submit" class="btn-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34" />
                            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2" />
                        </svg>
                        Mettre à jour
                    </button>

                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>
