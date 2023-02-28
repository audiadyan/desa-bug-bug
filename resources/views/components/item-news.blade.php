<a href='/information/news/{{ $news->slug }}'>
    <div class="block sm:flex bg-white border shadow-md rounded-xl p-1 transition ease-in-out delay-150 hover:scale-105">
        <div class="bg-cover bg-center rounded-lg overflow-hidden bg-no-repeat"
            style="
                    background-image: url('{{ asset('storage/' . $news->image) }}');
                    min-height: 200px;
                    min-width: 200px;
                    ">
        </div>

        <div class="card-body">
            <h2 class="card-title">
                {{ Str::limit($news->title, 60) }}
            </h2>

            <div class="flex justify-between">
                <div class="card-title text-sm">Oleh: <span
                        class="underline underline-offset-4">{{ $news->user->name ?? 'Anonim' }}</span></div>
                <div class="text-sm text-gray-400">{{ $news->created_at->diffForHumans() }}</div>
            </div>

            <p>{{ $news->excerpt }}</p>
        </div>
    </div>
</a>
