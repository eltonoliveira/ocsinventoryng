<?php
/*
 * @version $Id: config.tabs.php 100 2011-06-11 07:49:18Z remi $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2011 by the INDEPNET Development Team.

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
 along with GLPI; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Walid Nouh
// Purpose of file:
// ----------------------------------------------------------------------

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT . "/inc/includes.php");
header("Content-Type: text/html; charset=UTF-8");
header_nocache();

if (!isset($_POST["id"])) {
   exit();
}

if (!isset($_REQUEST['glpi_tab'])) {
   exit();
}

if (!isset($_POST["withtemplate"])) {
   $_POST["withtemplate"] = "";
}

$config = new PluginOcsinventoryngConfig();
if ($_POST['id']>0 && $config->can($_POST['id'],'r')) {
   switch($_REQUEST['glpi_tab']) {
      case -1 :
         $config->showScriptLock();
         Plugin::displayAction($config, $_REQUEST['glpi_tab'], $_POST["withtemplate"]);
         break;

      case 1 :
         $config->showScriptLock();
         break;
      default :
         if (!Plugin::displayAction($config, $_REQUEST['glpi_tab'], $_POST["withtemplate"])) {
         }
         break;
   }

}

ajaxFooter();

?>