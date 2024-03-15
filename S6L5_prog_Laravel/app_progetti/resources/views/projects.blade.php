<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(count($projects) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($projects as $project)
                                <li class="list-group-item">
                                    <strong>{{$project->name}}</strong>
                                    <span class="float-end">
                                        <a type="button" class="btn btn-outline-info" href="projects/{{$project->id}}">
                                            <i class="bi bi-clipboard-check"></i>
                                        </a>
                                    </span>
                                </li>
                            @endforeach
                            </ul>
                        @else
                            <p>I don't have any records!</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

