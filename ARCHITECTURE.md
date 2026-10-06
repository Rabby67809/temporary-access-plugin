# Temporary Access Live Control v1.0 — Architecture

## Product model
A secure, time-limited workspace system for WordPress. Every temporary worker receives an explicit access grant tied to a task, scope, expiry, and policy. The plugin must never grant broad administrator access by default.

## Modules
- bootstrap: plugin loading, compatibility checks, migrations
- database: grants, sessions, tasks, events, approvals, comments, notifications, locks
- access: token/session authentication and expiry
- policy: capability and field-level authorization
- task: progress, checklist, status, deadlines
- monitor: heartbeat, online/idle/paused/terminated states
- admin: dashboard, live controls, approvals, emergency controls
- audit: immutable-ish event trail with retention controls
- integrations: WooCommerce/Elementor adapters
- api: REST endpoints with nonce/capability checks
- ui: admin dashboard + worker workspace

## Security principles
- Least privilege and explicit scope
- All state-changing requests require authentication, capability checks and CSRF protection
- Prepared SQL for database operations
- Escape output; sanitize input
- Opaque high-entropy access tokens; never expose secrets in logs
- Rate-limit sensitive endpoints
- Avoid collecting screen/camera/keystrokes or data from unrelated tabs/apps
- Retention is configurable and defaults to the minimum useful period
- Destructive/publish actions can require owner approval

## Live monitoring model
Worker browser sends a heartbeat to a signed REST endpoint. Server records last_seen and session state. Admin dashboard polls for state changes and event deltas. The interface should support a future SSE transport without coupling business logic to transport.

States:
active -> idle -> paused -> active
active/idle/paused -> terminated
any pre-expiry state -> expired when expiry passes

## Core tables
- {prefix}tal_tasks
- {prefix}tal_grants
- {prefix}tal_sessions
- {prefix}tal_events
- {prefix}tal_approvals
- {prefix}tal_comments
- {prefix}tal_notifications

Every table gets versioned schema migrations.

## WordPress update strategy
Ship semantic versions. Include plugin Update URI metadata and a controlled updater that can check a trusted GitHub release endpoint. Releases contain a ready-to-upload ZIP. Upgrades run migrations before enabling new features. Never overwrite user data except through explicit migration logic.
