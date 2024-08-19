<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show recipe') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="pt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div
                        class="text-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                        role="alert">
                        <span class="font-medium">
                            {{__('Success!')}}
                        </span>
                        <br>
                        <span>
                             @if (session('success'))
                                {{ session('success') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="pt-4 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-white">

                        <div class="mx-auto max-w-7xl px-6 lg:px-8">

                            <div
                                class="mx-auto gap-x-8 gap-y-16  lg:mx-0 lg:max-w-none lg:grid-cols-3">

                                <article class="flex  flex-col items-start justify-between">

                                    <div>
                                        <img class="mb-5"
                                             src="https://picsum.photos/1280/420" alt="{{$recipe->title}}"
                                             draggable="false">
                                    </div>

                                    <div class="flex items-center gap-x-4 text-xs">
                                        <time datetime="2020-03-16" class="text-gray-500">
                                            {{ $recipe->created_at->format('j M Y') }}
                                        </time>

                                        @forelse($recipe->categories as $cat)
                                            <a href="{{route('categories', $cat)}}" id="{{$cat->id}}"
                                               class="relative z-10 rounded-full bg-red-400 px-3 py-1.5 font-medium text-white hover:bg-red-500">
                                                {{$cat->name}}
                                            </a>
                                        @empty

                                        @endforelse

                                    </div>
                                    <div class="group relative">

                                       <div class="flex justify-between items-center">
                                           <h1 class="mt-10 mb-10 text-5xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                               {{$recipe->title}}
                                           </h1>

                                           @if ($recipe->user->is(auth()->user()))
                                               <x-dropdown>
                                                   <x-slot name="trigger">
                                                       <button>
                                                           <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 text-gray-400"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                               <path
                                                                   d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                           </svg>
                                                       </button>
                                                   </x-slot>
                                                   <x-slot name="content">
                                                       <x-dropdown-link :href="route('recipes.edit', $recipe)">
                                                           {{ __('Edit') }}
                                                       </x-dropdown-link>
                                                       <form method="POST"
                                                             action="{{ route('recipes.destroy', $recipe) }}">
                                                           @csrf
                                                           @method('delete')
                                                           <x-dropdown-link
                                                               :href="route('recipes.destroy', $recipe)"
                                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                               {{ __('Delete') }}
                                                           </x-dropdown-link>
                                                       </form>
                                                   </x-slot>
                                               </x-dropdown>
                                           @endif
                                       </div>

                                        @if($recipe->ingredients)
                                            <div class="mb-5">
                                                <h2 class="mb-1 text-lg font-semibold text-black">
                                                    {{__('Ingredients:')}}
                                                </h2>

                                                <ul class="max-w-md space-y-1 text-gray-900 list-disc list-inside">
                                                    @foreach($recipe->ingredients as $ingredient)
                                                        <li>
                                                            <a href="{{route('ingredients', $ingredient)}}"
                                                               id="{{$ingredient->id}}">
                                                                {{$ingredient->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if($recipe->description)
                                            <div class="mb-5">
                                                <h2 class="mb-1 text-lg font-semibold text-black">
                                                    {{__('Description:')}}
                                                </h2>
                                                <p class="line-clamp-3 text-sm leading-6 text-gray-600">
                                                    {{ $recipe->description}}
                                                </p>
                                            </div>
                                        @endif

                                        @if($recipe->instructions)
                                            <div class="mb-5">
                                                <h2 class="mb-1 text-lg font-semibold text-black">
                                                    {{__('Instructions:')}}
                                                </h2>
                                                <p class="line-clamp-3 text-sm leading-6 text-gray-600">
                                                    {{ $recipe->instructions}}
                                                </p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="relative mt-8 flex items-start gap-x-4">
                                        <img
                                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" class="h-10 w-10 rounded-full bg-gray-50 mt-2">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{$recipe->user->name}}
                                                </a>
                                            </p>
                                            <p class="text-gray-600">
                                                {{$recipe->user->position}}
                                            </p>
                                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                                <i>
                                                    {{ $recipe->user->bio}}
                                                </i>
                                            </p>
                                        </div>

                                    </div>

                                </article>

                                <hr class="my-10">

                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-3/5">
                                        <!-- Content for the first column -->

                                        @forelse($comments as $comment)

                                            <article
                                                class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                <footer class="flex justify-between items-center mb-2">
                                                    <div class="flex items-center">
                                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                            <img
                                                                class="mr-2 w-6 h-6 rounded-full"
                                                                src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                                                alt="Helene Engels">
                                                            {{$comment->user->name}}
                                                        </p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                                            <time pubdate
                                                                  datetime="{{ $comment->created_at->format('j M Y') }}"
                                                                  title="{{ $comment->created_at->format('j M Y') }}">
                                                                {{ $comment->created_at->format('j M Y') }}
                                                            </time>
                                                        </p>
                                                    </div>

                                                    @if ($comment->user->is(auth()->user()))
                                                        <x-dropdown>
                                                            <x-slot name="trigger">
                                                                <button>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-4 w-4 text-gray-400"
                                                                         viewBox="0 0 20 20" fill="currentColor">
                                                                        <path
                                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                                    </svg>
                                                                </button>
                                                            </x-slot>
                                                            <x-slot name="content">
                                                                <x-dropdown-link :href="route('recipes.edit', $recipe)">
                                                                    {{ __('Edit') }}
                                                                </x-dropdown-link>
                                                                <form method="POST"
                                                                      action="{{ route('recipes.destroy', $recipe) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <x-dropdown-link
                                                                        :href="route('recipes.destroy', $recipe)"
                                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                                        {{ __('Delete') }}
                                                                    </x-dropdown-link>
                                                                </form>
                                                            </x-slot>
                                                        </x-dropdown>
                                                    @endif

                                                </footer>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    {!! $comment->comment !!}
                                                </p>
                                            </article>

                                        @empty

                                            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4"
                                                 role="alert">
                                                <p class="font-bold">
                                                    {{__('No comments here.')}}
                                                </p>
                                                <p>
                                                    {{__('Be the first one!')}}
                                                </p>
                                            </div>

                                        @endforelse

                                        <div class="mt-5">
                                            {{$comments->links()}}
                                        </div>

                                    </div>
                                    <div class="w-full md:w-2/5 pl-10">
                                        <!-- Content for the second column -->
                                        <form method="POST" action="{{route('comments.store')}}">
                                            @csrf
                                            <input type="hidden" id="recipe_id" name="recipe_id"
                                                   value="{{$recipe->id}}">
                                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900">
                                                {!! __('Leave a comment...') !!}
                                            </label>
                                            <textarea id="comment" name="comment" rows="4"
                                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                      placeholder="Your comment">{{ old('comment') }}</textarea>
                                            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
                                            <div class="text-right">
                                                <button type="submit"
                                                        class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                    {!! __('Submit') !!}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- More posts... -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

