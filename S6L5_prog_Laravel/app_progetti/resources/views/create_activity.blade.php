

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Activity Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="/activities">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Activity title">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="description" placeholder="Activity description">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="priority">
                                <option selected>Selected Project type</option>
                                <option value="very low">very low</option>
                                <option value="low">low</option>
                                <option value="medium">medium</option>
                                <option value="high">high</option>
                                <option value="very high">very high</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="end_date">
                            <input type="hidden" name="project_id" value="{{$project_id}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark d-block text-black">Add Activity</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
