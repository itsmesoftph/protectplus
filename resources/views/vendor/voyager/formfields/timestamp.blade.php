<input type="datetime"
@if($row->required == 1) required @endif @if(isset($options->readonly)) readonly @endif  class="form-control datepicker" name="{{ $row->field }}"
       value="@if(isset($dataTypeContent->{$row->field})){{ \Carbon\Carbon::parse(old($row->field, $dataTypeContent->{$row->field}))->format('m/d/Y g:i A') }}@else{{old($row->field)}}@endif">
