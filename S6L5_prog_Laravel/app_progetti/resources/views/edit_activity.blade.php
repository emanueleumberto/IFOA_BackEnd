<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Activity Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="/activities/{{$activity->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Activity title" value="{{$activity->title}}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="description" placeholder="Activity description" value="{{$activity->description}}">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="priority" value="{{$activity->priority}}">
                                <option selected>Selected Project type</option>
                                <option value="very low" @if ($activity->priority === "very low") {{ 'selected' }} @endif>very low</option>
                                <option value="low" @if ($activity->priority === "low") {{ 'selected' }} @endif>low</option>
                                <option value="medium" @if ($activity->priority === "medium") {{ 'selected' }} @endif>medium</option>
                                <option value="high" @if ($activity->priority === "high") {{ 'selected' }} @endif>high</option>
                                <option value="very high" @if ($activity->priority === "very high") {{ 'selected' }} @endif>very high</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="start_date" value="{{$activity->start_date}}">
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="end_date" value="{{$activity->end_date}}">
                            <input type="hidden" name="project_id" value="{{$activity->project_id}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark d-block text-black">Update Activity</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
