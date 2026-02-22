@props(['post'])
<div class="post-container">
    <div class="post-header">
        <div class="profile">
            <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('storage/profile.png') }}"
                alt="profil" class="profile-img">
            <p class="pseudo">
            <h5>{{ $post->user->pseudo }}</h5>
            </p>
        </div>

        <div class="meta1">
            <p class="date">{{ $post->created_at->diffForHumans() }}</p>
            <button class="follow-button">Suivre</button>
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
