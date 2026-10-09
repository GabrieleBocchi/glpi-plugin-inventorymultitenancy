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

const fs = require('fs');
const path = require('path');

const root = path.resolve(__dirname, '../../..');

test('plugin.xml declares the version defined in setup.php', () => {
    const setup = fs.readFileSync(path.join(root, 'setup.php'), 'utf8');
    const manifest = fs.readFileSync(path.join(root, 'plugin.xml'), 'utf8');

    const version = setup.match(/define\('PLUGIN_INVENTORYMULTITENANCY_VERSION', '([^']+)'\)/)[1];

    expect(manifest).toContain(`<num>${version}</num>`);
});
