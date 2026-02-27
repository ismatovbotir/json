<?php

use Livewire\Component;

new class extends Component
{
    public array $fields = [];

    public function addField($parentIndex = null)
    {
        $field = [
            'key' => '',
            'type' => 'string',
            'value' => '',
            'fields' => [], // для object
            'items' => [],  // для array of object
        ];

        if ($parentIndex === null) {
            $this->fields[] = $field;
        } else {
            $this->fields[$parentIndex]['fields'][] = $field;
        }
    }

    public function removeField($index)
    {
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }

    public function generateJson($fields)
    {
        $result = [];

        foreach ($fields as $field) {
            if (!$field['key']) continue;

            switch ($field['type']) {
                case 'string':
                    $result[$field['key']] = (string)$field['value'];
                    break;

                case 'number':
                    $result[$field['key']] = (float)$field['value'];
                    break;

                case 'boolean':
                    $result[$field['key']] = (bool)$field['value'];
                    break;

                case 'object':
                    $result[$field['key']] = $this->generateJson($field['fields']);
                    break;

                case 'array':
                    $result[$field['key']] = [
                        $this->generateJson($field['items'])
                    ];
                    break;
            }
        }

        return $result;
    }

    public function render()
    {
        return view('livewire.json-builder', [
            'json' => json_encode(
                $this->generateJson($this->fields),
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        ]);
    }
};
?>

<div class="flex gap-6">
    {{-- Конструктор --}}
    <div class="w-1/2 space-y-2">
        <button wire:click="addField" class="px-3 py-1 bg-blue-600 text-white">
            + Add field
        </button>

        @foreach($fields as $i => $field)
            <div class="flex gap-2 items-center">
                <input type="text" wire:model="fields.{{ $i }}.key"
                       placeholder="key"
                       class="border px-2 py-1 w-1/4">

                <select wire:model="fields.{{ $i }}.type" class="border px-2 py-1">
                    <option value="string">string</option>
                    <option value="number">number</option>
                    <option value="boolean">boolean</option>
                    <option value="object">object</option>
                    <option value="array">array</option>
                </select>

                @if(in_array($field['type'], ['string','number']))
                    <input type="text"
                           wire:model="fields.{{ $i }}.value"
                           placeholder="value"
                           class="border px-2 py-1 w-1/3">
                @endif

                <button wire:click="removeField({{ $i }})">🗑</button>
            </div>

            {{-- object --}}
            @if($field['type'] === 'object')
                <div class="ml-6">
                    <button wire:click="addField({{ $i }})"
                            class="text-sm text-blue-600">
                        + Add child field
                    </button>
                </div>
            @endif
        @endforeach
    </div>

    {{-- JSON Preview --}}
    <div class="w-1/2 bg-gray-900 text-green-400 p-4 text-sm overflow-auto">
        <pre>{{ $json }}</pre>
    </div>
</div>
