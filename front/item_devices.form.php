<?php
/*
 * @version $Id: item_devices.form.php 18957 2012-07-19 21:22:34Z moyo $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2012 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Remi Collet
// Purpose of file:
// ----------------------------------------------------------------------


define('GLPI_ROOT', '..');
include (GLPI_ROOT . "/inc/includes.php");

Session::checkCentralAccess();

if (isset($_POST["add"])) {
   $link_type = 'Item_'.$_POST['devicetype'];
   $link = new $link_type();
   $link->addDevices(1, $_POST['itemtype'], $_POST['items_id'], $_POST['devices_id']);
   Html::back();
} else if (isset($_POST["updateall"])) {
   Item_Devices::updateAll($_POST, false);
   Html::back();
} else if (isset($_POST["delete"])) {
   Item_Devices::updateAll($_POST, true);
   Html::back();
}
Html::displayErrorAndDie('Lost');

?>