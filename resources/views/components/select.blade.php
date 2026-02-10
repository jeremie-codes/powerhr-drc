@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select dark:bg-zink-600/50 border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200']) !!}>

<div {{ $disabled ? 'disabled' : '' }} class="flex items-center border ps-4 border-default bg-neutral-primary-soft rounded-base">
    <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 border rounded-full appearance-none text-neutral-primary border-default-medium bg-neutral-secondary-medium checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border-default">
    <label for="bordered-radio-1" class="w-full py-4 text-sm font-medium select-none ms-2 text-heading">Default radio</label>
</div>
<div class="flex items-center border ps-4 border-default bg-neutral-primary-soft rounded-base">
    <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 border rounded-full appearance-none text-neutral-primary border-default-medium bg-neutral-secondary-medium checked:border-brand focus:ring-2 focus:outline-none focus:ring-brand-subtle border-default">
    <label for="bordered-radio-2" class="w-full py-4 text-sm font-medium select-none ms-2 text-heading">Checked state</label>
</div>
