@props(['categories' => []])

<!-- Modal de création de post -->
<div id="postModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <h2>Créer une publication</h2>
            <button onclick="closeModal()" class="close-btn">&times;</button>
        </div>
        
        <form id="postForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Titre -->
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" class="form-input" placeholder="Le titre de votre article..." required>
            </div>
            
            <!-- Contenu -->
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea id="content" name="content" class="form-textarea" rows="6" placeholder="Écrivez votre article..." required></textarea>
            </div>
            
            <!-- Catégorie -->
            <div class="form-group">
                <label for="category">Catégorie</label>
                <select id="category" name="category_id" class="form-select" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Image de couverture -->
            <div class="form-group">
                <label for="image">Image de couverture</label>
                <div class="file-upload-area" onclick="document.getElementById('image').click()">
                    <input type="file" id="image" name="image" accept="image/*" style="display: none;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    <span>Cliquez pour ajouter une image</span>
                </div>
            </div>
            
            
            <div class="modal-footer">
                <button type="button" onclick="closeModal()" class="btn-cancel">Annuler</button>
                <button type="submit" class="btn-submit">Publier</button>
            </div>
        </form>
    </div>
</div>

   
