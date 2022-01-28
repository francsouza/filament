<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    @if ($isInline())
        <x-slot name="labelSuffix">
    @endif
            <div {{ $attributes->merge($getExtraAttributes())->class([
                'gap-2 space-y-2',
                'flex flex-wrap gap-3' => $isInline(),
                'filament-forms-radio-component',
            ]) }}>
                @foreach ($getOptions() as $value => $label)
                    <div @class([
                        'flex items-start',
                        'gap-3' => ! $isInline(),
                        'gap-2' => $isInline(),
                    ])>
                        <div class="flex items-center h-5">
                            <input
                                name="{{ $getId() }}"
                                id="{{ $getId() }}-{{ $value }}"
                                type="radio"
                                value="{{ $value }}"
                                {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
                                {{ $getExtraInputAttributeBag()->class([
                                    'focus:ring-primary-500 h-4 w-4 text-primary-600 dark:bg-dark-700 dark:checked:bg-primary-500',
                                    'border-gray-300 dark:border-dark-500' => ! $errors->has($getStatePath()),
                                    'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                                ]) }}
                                {!! $isOptionDisabled($value, $label) ? 'disabled' : null !!}
                            />
                        </div>

                        <div class="text-sm">
                            <label for="{{ $getId() }}-{{ $value }}" @class([
                                'font-medium',
                                'text-gray-700 dark:text-slate-200' => ! $errors->has($getStatePath()),
                                'text-danger-600' => $errors->has($getStatePath()),
                            ])>
                                {{ $label }}
                            </label>

                            @if ($hasDescription($value))
                                <p class="text-gray-500 dark:text-dark-400">
                                    {{ $getDescription($value) }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
    @if ($isInline())
        </x-slot>
    @endif
</x-forms::field-wrapper>
