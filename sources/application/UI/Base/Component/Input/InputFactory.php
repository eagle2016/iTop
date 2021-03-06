<?php
/**
 * @copyright   Copyright (C) 2010-2020 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */


namespace Combodo\iTop\Application\UI\Base\Component\Input;


use Combodo\iTop\Application\UI\Base\Component\Input\Select\Select;
use Combodo\iTop\Application\UI\Base\Component\Input\Select\SelectOption;

class InputFactory
{

	public static function MakeForHidden(string $sName, string $sValue, ?string $sId = null): Input
	{
		$oInput = new Input($sId);

		$oInput->SetType(Input::INPUT_HIDDEN)
			->SetName($sName)
			->SetValue($sValue);

		return $oInput;
	}

	public static function MakeForSelectWithLabel(string $sName, string $sLabel, ?string $sId = null): InputWithLabel
	{
		$oInput = new Select($sId);
		$oInput->SetName($sName);

		if (is_null($sId)) {
			$sId = $oInput->GetId();
		}
		$oInputWithLabel = new InputWithLabel($sLabel, $oInput, $sId);

		return $oInputWithLabel;
	}

	public static function MakeForTextareaWithLabel(
		string $sName, string $sLabel, ?string $sId = null, ?string $sValue = null,
		?int $iCols = null, ?int $iRows = null
	): InputWithLabel
	{
		$oTextArea = new TextArea($sValue, $sId, $iCols, $iRows);
		$oTextArea->SetName($sName);

		if (is_null($sId)) {
			$sId = $oTextArea->GetId();
		}
		$oInputWithLabel = new InputWithLabel($sLabel, $oTextArea, $sId);

		return $oInputWithLabel;
	}

	public static function MakeForSelect(string $sName, ?string $sId = null): Select
	{
		$oInput = new Select($sId);
		$oInput->SetName($sName);

		return $oInput;
	}

	public static function MakeForSelectOption(string $sValue, string $sLabel, bool $bSelected, ?string $sId = null): SelectOption
	{
		$oInput = new SelectOption($sId);

		$oInput->SetValue($sValue)
			->SetLabel($sLabel)
			->SetSelected($bSelected);

		return $oInput;
	}

}