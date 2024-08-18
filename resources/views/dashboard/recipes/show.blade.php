<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-white">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">

                            <div
                                class="mx-auto gap-x-8 gap-y-16  lg:mx-0 lg:max-w-none lg:grid-cols-3">

                                <article class="flex  flex-col items-start justify-between">
                                    <div class="flex items-center gap-x-4 text-xs">
                                        <time datetime="2020-03-16" class="text-gray-500">
                                            {{ $recipe->created_at->format('j M Y') }}
                                        </time>

                                        @forelse($recipe->categories as $cat)
                                            <a href="{{$cat->id}}"
                                               class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                                {{$cat->name}}
                                            </a>
                                        @empty

                                        @endforelse

                                    </div>
                                    <div class="group relative">
                                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            {{$recipe->title}}
                                        </h3>
                                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                            {{ $recipe->description}}
                                        </p>
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

                                <!-- More posts... -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

