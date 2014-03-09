<div class="settings-submit-wrapper">
	<input type="submit" value="{{$submit}}" class="settings-submit" name="nubasic-settings-submit" />
</div>

{{if $expert}}
{{include file="field_input.tpl" field=$link_colour}}
{{include file="field_input.tpl" field=$body_font_size}}
{{include file="field_input.tpl" field=$font_size}}
{{include file="field_input.tpl" field=$font_colour}}
<div class="settings-submit-wrapper">
	<input type="submit" value="{{$submit}}" class="settings-submit" name="nubasic-settings-submit" />
</div>
{{/if}}
