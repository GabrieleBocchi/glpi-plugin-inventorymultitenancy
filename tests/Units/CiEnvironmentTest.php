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

namespace GlpiPlugin\Inventorymultitenancy\Tests\Units;

use PHPUnit\Framework\TestCase;

/**
 * Checks that the `extra-env` secret of the plugin CI workflow is exposed to PHPUnit.
 */
final class CiEnvironmentTest extends TestCase
{
    public function testExtraEnvIsExposed(): void
    {
        if (getenv('GITHUB_ACTIONS') !== 'true') {
            $this->markTestSkipped('Only relevant on GitHub Actions.');
        }

        $this->assertSame('loaded', getenv('PLUGIN_INVENTORYMULTITENANCY_CI_EXTRA_ENV'));
    }
}
