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

import { expect, test } from '../../../../../tests/e2e/fixtures/glpi_fixture';
import { Profiles } from '../../../../../tests/e2e/utils/Profiles';

test('Plugin is listed in the plugins page', async ({ page, profile }) => {
    await profile.set(Profiles.SuperAdmin);
    await page.goto('/front/plugin.php');

    await expect(page.getByRole('main').getByText('Inventory Multitenancy', { exact: true })).toBeVisible();
});
