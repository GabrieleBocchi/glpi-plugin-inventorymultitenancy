#!/usr/bin/env bash
# Executed by the plugin-ci-workflows `init-script` input before dependencies are installed.
set -euo pipefail

php --version
composer --version
node --version
