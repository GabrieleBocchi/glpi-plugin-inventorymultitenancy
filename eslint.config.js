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

const js = require('@eslint/js');
const globals = require('globals');

module.exports = [
    {
        ignores: ['node_modules/', 'var/', 'vendor/'],
    },
    js.configs.recommended,
    {
        languageOptions: {
            globals: globals.node,
        },
    },
    {
        files: ['tests/js/jest/**/*.js'],
        languageOptions: {
            globals: globals.jest,
        },
    },
];
