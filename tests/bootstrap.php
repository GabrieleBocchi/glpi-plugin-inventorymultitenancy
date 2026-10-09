<?php

/**
 * -------------------------------------------------------------------------
 * Inventory Multitenancy plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of Inventory Multitenancy.
 *
 * Inventory Multitenancy is dual-licensed under the MIT License and the
 * Apache License, Version 2.0, at your option.
 * See the LICENSE-MIT and LICENSE-APACHE files at the root of the project.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2026 Würth IT Italy S.r.l.
 * @license   MIT OR Apache-2.0
 * @link      https://github.com/neteye-platform/glpi-plugin-inventorymultitenancy
 * -------------------------------------------------------------------------
 */

$current_plugin_folder = basename(realpath(__DIR__ . '/../'));

require __DIR__ . '/../../../tests/bootstrap.php';

if (file_exists(dirname(__DIR__) . '/vendor/autoload.php')) {
    require dirname(__DIR__) . '/vendor/autoload.php';
}

if (!Plugin::isPluginActive($current_plugin_folder)) {
    throw new RuntimeException(
        sprintf('Plugin %s is not active in the test database', $current_plugin_folder)
    );
}
