<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('tasks.create') }}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Create new task
                    </a>

                    <form action="{{ route('tasks.downloadReport') }}" id="report_form" class="border-2 my-5 p-5">
                        <h3>Generate report</h3>
                        <div class="my-10 flex justify-between">
                            <div class="w-1/2">
                                <x-input-label for="from" :value="__('Deadline from')"/>
                                <x-text-input id="from" class="block mt-1 w-full" type="date" name="from"
                                              :value="old('from')" required autofocus/>
                                <x-input-error :messages="$errors->get('from')" class="mt-2"/>
                            </div>

                            <div class="w-1/2">
                                <x-input-label for="to" :value="__('Deadline to')"/>
                                <x-text-input id="to" class="block mt-1 w-full" type="date" name="to"
                                              :value="old('to')" required autofocus/>
                                <x-input-error :messages="$errors->get('to')" class="mt-2"/>
                            </div>

                            <x-text-input id="report_type" class="block mt-1 w-full" type="hidden" name="report_type"/>
                        </div>

                        <button type="button"
                                onclick="setReportType('excel')"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Excel
                        </button>

                        <button type="button"
                                onclick="setReportType('csv')"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            CSV
                        </button>

                        <button type="button"
                                onclick="setReportType('pdf')"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            PDF
                        </button>
                    </form>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Comment
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deadline
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Time spent
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $task->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $task->comment }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $task->deadline }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $task->time_spent_hours ?? 0 }}:{{ $task->time_spent_minutes ?? 0 }}
                                    </td>
                                    <td class="px-6 py-4 flex justify-between">
                                        <a href="{{ route('tasks.edit', $task) }}"
                                           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Edit
                                        </a>
                                        <div>
                                            <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $tasks->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function setReportType(value) {
                $('#report_type').val(value);
                $("#report_form").trigger("submit");
            }
        </script>
    @endpush

</x-app-layout>

