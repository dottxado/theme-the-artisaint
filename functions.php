<?php
require 'vendor/autoload.php';

\dottxado\theartisaint\ThemeSetup::get_instance();
\dottxado\theartisaint\ThemeDocumentation::get_instance();

if (\dottxado\theartisaint\ThemeSetup::check_dependency()) {
	\dottxado\theartisaint\StorefrontMods::get_instance();
	\dottxado\theartisaint\WoocommerceMods::get_instance();
}
