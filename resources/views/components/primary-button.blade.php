<button {{ $attributes->merge(['type' => 'submit', 'class' => ' items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

{{-- <button {{ $attributes->merge(['class' => 'relative inline-flex items-center justify-center h-10 px-3 rounded-md border border-transparent font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>
    <span class="sr-only">{{ $slot }}</span>
    <img class="w-4 mr-2" src="{{ $icon }}">
    {{ $slot }}
</button> --}}
