<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="/projects/{{$project->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Project name" value="{{$project->name}}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="description" placeholder="Project description" value="{{$project->description}}">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="state">
                            'create', 'start', 'complete', 'end'
                                <option selected>Selected Project state</option>
                                <option value="create" @if ($project->state === "create") {{ 'selected' }} @endif>Create</option>
                                <option value="start" @if ($project->state === "start") {{ 'selected' }} @endif>Start</option>
                                <option value="complete" @if ($project->state === "complete") {{ 'selected' }} @endif>Complete</option>
                                <option value="end" @if ($project->state === "end") {{ 'selected' }} @endif>End</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="type">
                                <option selected>Selected Project type</option>
                                <option value="Front-End" @if ($project->type === "Front-End") {{ 'selected' }} @endif>Front-End</option>
                                <option value="Back-End" @if ($project->type === "Back-End") {{ 'selected' }} @endif>Back-End</option>
                                <option value="Full-Stack" @if ($project->type === "Full-Stack") {{ 'selected' }} @endif>Full-Stack</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="language">
                                <option selected>Selected Project language</option>
                                <option value="Javascript/Node" @if ($project->language === "Javascript/Node") {{ 'selected' }} @endif>Javascript/Node</option>
                                <option value="Laravel/Blade" @if ($project->language === "Laravel/Blade") {{ 'selected' }} @endif>Laravel/Blade</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark d-block text-black">Update Project</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
