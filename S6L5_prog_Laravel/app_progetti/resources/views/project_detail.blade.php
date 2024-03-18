<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Detail Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row g-0">
                        <div class="card-body my-3">
                            <h1 class="card-title"><strong>Project Name: </strong>{{$project->name}}</h1>
                            <p class="card-text"><strong>Description: </strong>{{$project->description}}</p>
                            <p class="card-text"><strong>Type: </strong>{{$project->type}}</p>
                            <p class="card-text"><strong>Language: </strong>{{$project->language}}</p>
                            <p class="card-text"><strong>State: </strong>{{$project->state}}</p>
                            <p class="card-text"><strong>Created: </strong>{{$project->created_at}}</p>
                        </div>
                        <div class="card-body my-3">
                            <a type="button" href="/activities/create?id={{$project->id}}" class="btn btn-dark d-block text-black">Add Activity</a>
                        </div>
                        <div class="card-body my-3">
                            <h2 class="card-title">{{ __('Activities') }}</h2>
                            @if(count($project->activities) > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach ($project->activities as $activity)
                                        <li class="list-group-item">
                                            {{$activity->title}}
                                            <span class="d-flex float-end">
                                                <a type="button" class="btn btn-outline-info me-2" href="/activities/{{$activity->id}}">
                                                    <i class="bi bi-clipboard-check"></i>
                                                </a>
                                                <form method="post" action="/activities/{{$activity->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>I don't have any records!</p>
                            @endif
                        </div>
                        <div class="card-body my-3">
                            <a type="button" class="btn btn-outline-warning d-block" href="/projects/{{$project->id}}/edit">Edit</a>
                        </div>
                        <div class="card-body my-3">
                            <a type="button" class="btn btn-outline-dark d-block" href="{{route('projects')}}">Back</a>
                        </div>
                        <div class="card-footer">
                            <p class="card-text"><small class="text-body-secondary">Last updated {{$project->updated_at}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




<
