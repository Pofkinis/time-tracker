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
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="comment" :value="__('Comment')" />
                            <x-text-input id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment', $task->comment)" autofocus />
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="deadline" :value="__('Deadline')" />
                            <x-text-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline', $task->deadline)" autofocus />
                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="time_spent_hours" :value="__('Time spent (hours)')" />
                            <x-text-input id="time_spent_hours" class="block mt-1 w-full" type="number" name="time_spent_hours" :value="old('time_spent_hours', $task->time_spent_hours)" autofocus />
                            <x-input-error :messages="$errors->get('time_spent_hours')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="time_spent_minutes" :value="__('Time spent (minutes)')" />
                            <x-text-input id="time_spent_minutes" class="block mt-1 w-full" type="number" name="time_spent_minutes" :value="old('time_spent_minutes', $task->time_spent_minutes)" autofocus />
                            <x-input-error :messages="$errors->get('time_spent_minutes')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
