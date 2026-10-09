import { readFileSync } from 'node:fs';
import { expect, test } from 'vitest';

const manifest = readFileSync(new URL('../../../plugin.xml', import.meta.url), 'utf8');

test('plugin.xml download URLs match the release archive naming', () => {
    const versions = [...manifest.matchAll(/<num>([^<]+)<\/num>[\s\S]*?<download_url>([^<]+)<\/download_url>/g)];

    expect(versions.length).toBeGreaterThan(0);
    for (const [, num, url] of versions) {
        expect(url).toMatch(new RegExp(`/releases/download/${num}/glpi-inventorymultitenancy-${num}\\.tar\\.bz2$`));
    }
});
