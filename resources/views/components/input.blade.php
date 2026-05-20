@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-surface-600 dark:bg-surface-800 dark:text-surface-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
