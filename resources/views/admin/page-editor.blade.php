@extends('layouts.admin')

@section('title', 'Page Content Editor')

@section('content')
<form action="{{ route('admin.page-editor.update') }}" method="POST" class="space-y-8">
    @csrf
    <div class="flex justify-between items-center bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm">
        <h3 class="text-xl font-bold dark:text-white">Landing Page Editor</h3>
        <button
            type="submit"
            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors"
        >
            Save Changes
        </button>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach(['hero', 'about'] as $section)
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h4 class="text-lg font-semibold dark:text-white uppercase tracking-wider mb-6 border-b pb-2">
                {{ ucfirst($section) }} Section
            </h4>
            
            <div class="space-y-6">
                @foreach($contents->where('section', $section) as $index => $item)
                    <div class="flex flex-col space-y-2">
                        <input type="hidden" name="contents[{{ $item->id }}][id]" value="{{ $item->id }}">
                        
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ str_replace('_', ' ', $item->key) }}
                        </label>
                        
                        @if($item->type === 'textarea')
                            <textarea
                                name="contents[{{ $item->id }}][value]"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 min-h-[100px]"
                            >{{ old("contents.{$item->id}.value", $item->value) }}</textarea>
                        @else
                            <input
                                type="text"
                                name="contents[{{ $item->id }}][value]"
                                value="{{ old("contents.{$item->id}.value", $item->value) }}"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500"
                            >
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</form>
@endsection
