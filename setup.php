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

define('PLUGIN_INVENTORYMULTITENANCY_VERSION', '1.0.0');

function plugin_version_inventorymultitenancy()
{
    return ['name' => "Inventory Multitenancy",
        'version' => PLUGIN_INVENTORYMULTITENANCY_VERSION,
        'author' => 'NetEye R&D Team',
        'license' => 'MIT/Apache-2.0',
        'homepage' => 'https://neteye-blog.com',
        'minGlpiVersion' => '10.0.6']; // For compatibility / no install in version < 0.80
}

function plugin_inventorymultitenancy_check_prerequisites()
{
    if (version_compare(GLPI_VERSION, '10.0.6', '<')) {
        echo "This plugin requires GLPI >= 10.0.6";
        return false;
    }
    return true;
}

function plugin_inventorymultitenancy_check_config($verbose = false)
{
    return true;
}

function plugin_init_inventorymultitenancy()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['inventorymultitenancy'] = true;
    $PLUGIN_HOOKS['post_process_import_entity_rules']['inventorymultitenancy'] = 'plugin_post_process_importentity_rules_inventorymultitenancy';
}

function plugin_post_process_importentity_rules_inventorymultitenancy($params)
{
    if (! empty($params->rulesTargetEntity['entities_id'])) {
        if (in_array($params->rulesTargetEntity['entities_id'], getSonsOf("glpi_entities", $_SESSION['glpiactive_entity']))) {
            return;
        }
    }

    if (empty($_SESSION['glpiactive_entity']) && $_SESSION['glpiactive_entity'] !== 0) {
        throw new \Exception('PANIC! Cannot find the logged user active entity, something bad is happening...' . $_SESSION['glpiactive_entity']);
    }

    $params->mainAssetObj->setEntityID($_SESSION['glpiactive_entity']);
}
