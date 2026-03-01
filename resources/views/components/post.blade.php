@props(['post'])
<div class="post-container">
    <div class="post-header">
        <div class="profil">
            <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('storage/profile.png') }}"
                alt="profil" class="profile-img">
            <div class="user-info">
                <h5 class="pseudo">{{ $post->user->pseudo }}</h5>
                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <div class="post-actions">
            <button class="follow-button">Suivre</button>

            @auth
                @if (auth()->id() === $post->user_id)
                    <div class="post-edit-actions">
                        <a href="{{ route('posts.edit', $post) }}" class="edit-btn" title="Modifier">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                            </svg>
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Supprimer ce post ?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Supprimer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
    <div class="post-body">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        @if ($post->image)
            <img class="post-image" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        @endif
    </div>
    <div class="post-footer">
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M2 21h4V9H2v12zm20-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L13.17 1 6.59 7.59C6.22 7.95 6 8.45 6 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1z" />
            </svg>
            {{ $post->like }}
        </p>

        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v16l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
            </svg>
            {{ $post->comments->count() }}

        </p>


        <p>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M22 3h-4v12h4V3zM2 14c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L10.83 23l6.58-6.59c.37-.36.59-.86.59-1.41V5c0-1.1-.9-2-2-2H7c-.83 0-1.54.5-1.84 1.22L2.14 11.27c-.09.23-.14.47-.14.73v2z" />
            </svg>

        </p>



    </div>
</div>
