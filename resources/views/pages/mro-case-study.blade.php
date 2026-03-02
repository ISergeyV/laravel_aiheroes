@extends('partials.layout')

@section('title', 'MRO Supply Case Study | AI Heroes')

@section('content')
<article class="case-study-detail">
    <!-- Hero Section -->
    <header class="cs-hero w-full">
        <div class="max-w-[1200px] mx-auto px-8 py-16">
            <div class="cs-hero__content">
                <div class="cs-badge">Production-Ready Pipeline</div>
                <h1 class="cs-title">High-Performance<br>Data Migration Architecture</h1>
                <p class="cs-subtitle">Fault-tolerant ETL solution migrating 10,000+ assets from Monday.com to
                    Google Drive with zero downtime.</p>

                <div class="cs-metrics-grid">
                    <div class="cs-metric">
                        <span class="cs-metric__value">10k+</span>
                        <span class="cs-metric__label">Assets Migrated</span>
                    </div>
                    <div class="cs-metric">
                        <span class="cs-metric__value">ETL</span>
                        <span class="cs-metric__label">Full Pipeline</span>
                    </div>
                    <div class="cs-metric">
                        <span class="cs-metric__value">100%</span>
                        <span class="cs-metric__label">Data Integrity</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Overview Section -->
    <section class="section cs-section w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <div class="cs-grid">
                <div class="cs-content">
                    <h2 class="section-title">The Challenge</h2>
                    <p>MRO Supply needed to migrate a massive volume of project data, including images,
                        documents, and metadata, from Monday.com to a Google Drive archive. The sheer scale
                        (10,000+ records) made manual migration impossible, while standard export tools failed
                        to handle the complexity of linked assets and "living" documents.</p>

                    <h3 class="cs-heading-sm">Key Requirements</h3>
                    <ul class="cs-list">
                        <li><strong>Resumable execution:</strong> Network failures shouldn't restart the
                            process.</li>
                        <li><strong>Data integrity:</strong> Every file must be verified and logged.</li>
                        <li><strong>Smart processing:</strong> Large images need compression; documents need
                            conversion.</li>
                    </ul>
                </div>
                <div class="cs-sidebar">
                    <div class="cs-info-card">
                        <h4>Client</h4>
                        <p>MRO Supply</p>
                        <h4>Industry</h4>
                        <p>Industrial Supply</p>
                        <h4>Scope</h4>
                        <p>Data Engineering, Automation</p>
                        <h4>Repository</h4>
                        <a href="https://github.com/ISergeyV/MRO_monday_to_slack_gsheet" target="_blank"
                            class="cs-link">View on GitHub &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Engineering Deep Dive -->
    <section class="section cs-section cs-bg-dark w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <h2 class="section-title text-white">Engineering The Solution</h2>
            <p class="section-subtitle text-white-opacity">We didn't just write a script; we built a robust data
                pipeline.</p>

            <div class="feature-blocks">
                <div class="feature-block">
                    <div class="feature-icon">🛡️</div>
                    <h3>Resumable Migration</h3>
                    <p>Implemented a state-aware system using <code>migration_state.txt</code>. The pipeline
                        tracks every processed ID, allowing it to resume exactly where it left off after any
                        interruption, ensuring zero duplicated effort.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-icon">⚡</div>
                    <h3>Concurrency & Threading</h3>
                    <p>Leveraged Python's <code>concurrent.futures.ThreadPoolExecutor</code> to process up to 5
                        assets in parallel. This multi-threaded approach reduced total migration time by 70%
                        compared to sequential processing.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-icon">🖼️</div>
                    <h3>Smart Image Optimization</h3>
                    <p>Integrated <strong>Pillow (PIL)</strong> to detect and compress images >1MB on the fly.
                        This optimization maximized storage efficiency without compromising visual quality for
                        archival purposes.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-icon">🤖</div>
                    <h3>Browser Automation</h3>
                    <p>Standard APIs couldn't export Monday.com's internal "Docs". We deployed
                        <strong>Playwright</strong> to simulate user sessions, rendering and capturing these
                        documents as Markdown files automatically.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Stack -->
    <section class="section cs-section w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <h2 class="section-title">Technology Stack</h2>
            <div class="tech-grid">
                <div class="tech-card">
                    <h4>Core Logic</h4>
                    <div class="tech-tags">
                        <span class="tech-tag">Python 3.10+</span>
                        <span class="tech-tag">ThreadPoolExecutor</span>
                        <span class="tech-tag">Dotenv</span>
                    </div>
                </div>
                <div class="tech-card">
                    <h4>APIs & Data</h4>
                    <div class="tech-tags">
                        <span class="tech-tag">Monday.com GraphQL</span>
                        <span class="tech-tag">Google Drive API v3</span>
                        <span class="tech-tag">Google Sheets API v4</span>
                    </div>
                </div>
                <div class="tech-card">
                    <h4>Automation</h4>
                    <div class="tech-tags">
                        <span class="tech-tag">Playwright (Chromium)</span>
                        <span class="tech-tag">Pillow (Image Processing)</span>
                        <span class="tech-tag">Slack SDK</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Workflow Visual -->
    <section class="section cs-section cs-bg-light w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <h2 class="section-title text-center">Pipeline Architecture</h2>
            <div class="pipeline-visual">
                <div class="pipeline-step">
                    <span class="step-number">01</span>
                    <h4>Init & State Check</h4>
                    <p>Load local state <br> & Verify API keys</p>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <span class="step-number">02</span>
                    <h4>Fetch Data</h4>
                    <p>GraphQL Cursor based <br> Pagination</p>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <span class="step-number">03</span>
                    <h4>Process</h4>
                    <p>Compress Images <br> & Render Docs</p>
                </div>
                <div class="pipeline-arrow">→</div>
                <div class="pipeline-step">
                    <span class="step-number">04</span>
                    <h4>Upload & Log</h4>
                    <p>Drive Upload <br> & Sheet Entry</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section bottom-cta w-full">
        <div class="max-w-[1200px] mx-auto px-8 text-center">
            <h2 class="section-title">Need a custom engineering solution?</h2>
            <p class="section-subtitle">We build production-grade automation for complex workflows.</p>
            <a href="/#contact" class="btn btn--primary" style="margin-top: 20px;">Book a
                Consultation</a>
        </div>
    </section>
</article>
@endsection
