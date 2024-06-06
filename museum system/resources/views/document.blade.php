
<div class="field-container-3 other-document" data-doc-num="{{ $doc_idx }}">
    <div class="mb-3">
        <label for="doc_type" class="form-label">Тип документа</label>
        <select class="form-select col-lg-4" id="doc_type" aria-label="doc_type" wire:model="docs.{{ $doc_idx }}.type" {{ isset($is_disabled) ? 'disabled' : ''}}>
            <option value="">{{ config('msg.not-selected') }}</option>
            @foreach($doc_types as $key => $type)
            <option value="{{ $key }}">{{ $type }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 row">
        <div class="col-md-6">
            <label for="doc_num" class="form-label">№ документа</label>
            <input type="text" class="form-control" id="doc_num" name="text" placeholder="Укажіть номер акту" wire:model="docs.{{ $doc_idx }}.num" {{ isset($is_disabled) ? 'disabled' : ''}}/>
            <span class="text-danger"> @error('doc_num') {{ $message }} @enderror</span>
        </div>
        <div class="col-md-6">
            <label for="doc_date" class="form-label">Дата підписання документа</label>
            <input type="date" class="form-control" id="doc_date" placeholder="Уведіть дату" wire:model="docs.{{ $doc_idx }}.date" {{ isset($is_disabled) ? 'disabled' : ''}}/>
        </div>
    </div>
</div>
