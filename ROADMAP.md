# Roadmap

## Phase 1 — Foundation
- Secure plugin bootstrap
- DB migrations and versioning
- Temporary grant/session/task models
- Admin capability model
- REST API base
- CI

## Phase 2 — Access & permissions
- Time-based expiry
- Per-user grants
- Per-object scope
- Field-level permissions
- One-time access links
- Emergency revoke

## Phase 3 — Live operations
- Heartbeat
- Active/idle/paused state
- Live dashboard
- Start/stop/pause/resume/extend
- Task progress and checklist
- Activity timeline
- Owner↔worker comments

## Phase 4 — Governance
- Approval queue
- Publish/delete protection
- Revision/diff and rollback
- Audit export
- Notifications
- Retention policies

## Phase 5 — Ecosystem
- WooCommerce adapters
- Elementor adapters
- Webhooks
- REST API integrations
- Access templates
- Multi-admin oversight

## WordPress delivery
- Development builds are tracked on GitHub branches.
- Stable versions are tagged releases.
- Each stable release publishes a WordPress-installable ZIP.
- Production sites update through WordPress's normal plugin update flow using the trusted update endpoint/release metadata.
