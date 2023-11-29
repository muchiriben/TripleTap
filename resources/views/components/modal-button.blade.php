<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-light-color dark:bg-gray-200 border border-transparent rounded-md font-bold text-xs text-primary-color dark:text-gray-800 uppercase tracking-widest hover:border-2 hover:border-accent-color dark:hover:bg-white focus:bg-accent-color dark:focus:bg-white active:bg-accent-color dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
