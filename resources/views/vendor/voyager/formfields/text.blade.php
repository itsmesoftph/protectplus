<input type="text"
    @if($row->required == 0) required @endif
   @if(isset($options->readonly)) readonly @endif
 class="form-control" name="{{ $row->field }}"
        placeholder="{{ old($row->field, $options->placeholder ??
        $row->getTranslatedAttribute('display_name')) }}"
       {!! isBreadSlugAutoGenerator($options) !!}
       value="{{ old($row->field, $dataTypeContent->{$row->field} ??
       $options->default ?? '') }}">
