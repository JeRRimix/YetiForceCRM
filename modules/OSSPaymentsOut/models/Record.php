<?php
/*+***********************************************************************************************************************************
 * The contents of this file are subject to the YetiForce Public License Version 1.1 (the "License"); you may not use this file except
 * in compliance with the License.
 * Software distributed under the License is distributed on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or implied.
 * See the License for the specific language governing rights and limitations under the License.
 * The Original Code is YetiForce.
 * The Initial Developer of the Original Code is YetiForce. Portions created by YetiForce are Copyright (C) www.yetiforce.com.
 * All Rights Reserved.
 *************************************************************************************************************************************/
class OSSPaymentsOut_Record_Model extends Vtiger_Record_Model {

	public function getSummary($type, $bank, $file) {
		$adres = vglobal('cache_dir');
		if($bank == 'Default'){
			vimport('~~modules/OSSPaymentsOut/helpers/' . $type . '.php');
			$records = new $type($adres . $file);
			return $records;
		}

		vimport('~~modules/OSSPaymentsOut/helpers/subclass/' . $type . '_' . $bank . '.php');
		$class = $type . '_' . $bank;
		$records = new $class($adres . $file);

		return $records;
	}
}