<?php

use dottxado\theartisaint\StorefrontMods;
use dottxado\theartisaint\ThemeDocumentation;
use dottxado\theartisaint\ThemeSetup;
use dottxado\theartisaint\WoocommerceMods;

require 'vendor/autoload.php';

ThemeSetup::get_instance();
ThemeDocumentation::get_instance();

if ( ThemeSetup::check_dependency() ) {
	StorefrontMods::get_instance();
	WoocommerceMods::get_instance();
}
