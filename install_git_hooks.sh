#!/bin/bash
PROJECT_ROOT="$(git rev-parse --show-toplevel)"

cd "$PROJECT_ROOT"
git config core.hookspath "$PROJECT_ROOT"/.git-hooks
