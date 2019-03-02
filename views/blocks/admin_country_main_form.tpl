<!--Add field for VAT for each country to be inserted-->
[{$smarty.block.parent}]
<tr>
	[{ oxmultilang ident="werde_countryspecificvat_countrytext" }]<input type="text" name="editval[oxcountry__country_specific_vat]" value="[{$edit->oxcountry__country_specific_vat->value}]" />
</tr>