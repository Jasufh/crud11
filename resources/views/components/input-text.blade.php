@props(['name', 'title'])

<label class="font-medium" for="{{ $name }}">{{ $title }}</label>
<input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
    class="rounded-md">



