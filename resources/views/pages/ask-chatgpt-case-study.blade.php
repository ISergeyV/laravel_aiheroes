@extends('partials.layout')

@section('title', 'Accelerating AI Workflows Case Study | AI Heroes')

@section('content')
<article class="case-study-detail">
    <!-- Hero Section -->
    <header class="cs-hero w-full">
        <div class="max-w-[1200px] mx-auto px-8 py-16">
            <div class="cs-hero__content">
                <div class="cs-badge">Enterprise Productivity Tool</div>
                <h1 class="cs-title">Accelerating Workflow Velocity:<br>Zero-Friction LLM Integration</h1>
                <p class="cs-subtitle">Eradicating operational friction by deploying a direct, secure browser bridge from any digital context straight to the user's active OpenAI session.</p>

                <div class="cs-metrics-grid">
                    <div class="cs-metric">
                        <span class="cs-metric__value">Zero</span>
                        <span class="cs-metric__label">Context Switching</span>
                    </div>
                    <div class="cs-metric">
                        <span class="cs-metric__value">Client</span>
                        <span class="cs-metric__label">Side Security</span>
                    </div>
                    <div class="cs-metric">
                        <span class="cs-metric__value">MV3</span>
                        <span class="cs-metric__label">Secure Architecture</span>
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
                    <p>In modern digital workspaces, professionals interact with high-value contextual data across highly disparate web platforms—from proprietary CRMs to specialized dashboards and research portals.</p>
                    <p>To leverage Large Language Models (LLMs) like ChatGPT for this data, users are forced into costly context switching: manually highlighting, copying, navigating away from the source tab, pasting data into a chat interface, and reformating prompts. This manual data pipeline introduces unnecessary operational friction, leading to significant productivity hemorrhage and broken cognitive flow for enterprise teams.</p>

                    <h3 class="cs-heading-sm">The Engineering Solution</h3>
                    <p>I architected the <strong>Ask-ChatGPT</strong> enterprise browser extension specifically to eradicate this operational friction. Rather than relying on clunky API layers that attempt to duplicate the native ChatGPT interface, this solution deploys a direct, secure browser bridge from any digital context straight to the user's active OpenAI session.</p>
                    
                    <ul class="cs-list">
                        <li><strong>Dynamic Tab Management:</strong> Utilizing asynchronous Chrome background Service Workers to manage tab states intelligently.</li>
                        <li><strong>Guaranteed Transmission:</strong> Resilient, recursive payload injection logic with retries ensures 100% success—regardless of network latency, DOM hydration, or page rendering.</li>
                        <li><strong>Targeted Injection:</strong> Programmatically injecting the payload directly into the complex, dynamically rendered DOM structure of the React-based chat interface.</li>
                    </ul>
                </div>
                <div class="cs-sidebar">
                    <div class="cs-info-card">
                        <h4>Product Type</h4>
                        <p>Browser Extension (B2B)</p>
                        <h4>Focus</h4>
                        <p>Workflow Automation, AI Integration</p>
                        <h4>Tech Architecture</h4>
                        <p>MV3, Service Workers, Async JS</p>
                        <h4>Repository</h4>
                        <a href="https://github.com/ISergeyV/Ask-CHatGPT" target="_blank"
                            class="cs-link">View Source Code &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Value Deep Dive -->
    <section class="section cs-section cs-bg-dark w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <h2 class="section-title text-white">Commercial Reliability</h2>
            <p class="section-subtitle text-white-opacity">An architecture built on security, compliance, and flawless execution under load.</p>

            <div class="feature-blocks">
                <div class="feature-block">
                    <div class="feature-icon">🛡️</div>
                    <h3>Security & Privacy</h3>
                    <p>The architecture operates entirely client-side. There are no intermediary proxy servers, no external databases, and no telemetry webhooks. Sensitive proprietary data travels strictly within the local machine securely.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-icon">🏢</div>
                    <h3>Zero Corporate Logging</h3>
                    <p>Because interaction bridges directly to OpenAI's encrypted interface via local execution, zero data logging occurs on intermediary servers, fully preserving corporate confidentiality.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-icon">🚀</div>
                    <h3>Performance & Scalability</h3>
                    <p>Asynchronous tab management prevents main-thread blocking, ensuring zero performance degradation. The DOM manipulation logic is highly fault-tolerant against OpenAI's structural frontend updates.</p>
                </div>
                <div class="feature-block">
                    <div class="feature-icon">📜</div>
                    <h3>Compliance Standard</h3>
                    <p>Engineered strictly adhering to Google's Manifest V3 (MV3) security standards. This guarantees long-term viability, robust permission sandboxing, and immunity to legacy deprecation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Stack -->
    <section class="section cs-section w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <h2 class="section-title">Strategic Tech Stack</h2>
            <div class="tech-grid">
                <div class="tech-card">
                    <h4>Manifest V3 (MV3)</h4>
                    <p class="text-sm mt-3 text-slate-600 leading-relaxed">Selected specifically for its strictly scoped permissions and enforced ephemeral execution of background service workers, delivering superior memory management.</p>
                </div>
                <div class="tech-card">
                    <h4>Vanilla ES6+</h4>
                    <p class="text-sm mt-3 text-slate-600 leading-relaxed">Utilized to maintain a zero-dependency, ultra-lightweight footprint. Bypassing heavy frontend frameworks ensures instantaneous execution and minimizes the attack surface.</p>
                </div>
                <div class="tech-card">
                    <h4>Asynchronous APIs</h4>
                    <p class="text-sm mt-3 text-slate-600 leading-relaxed">Complex interactions between `chrome.contextMenus` and `chrome.tabs` optimally orchestrated using Promises/Event Listeners to guarantee race-condition-free cross-context execution.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section bottom-cta w-full">
        <div class="max-w-[1200px] mx-auto px-8 text-center">
            <h2 class="section-title">Let's architect your competitive advantage.</h2>
            <p class="section-subtitle max-w-[800px] mx-auto">This system exemplifies lightweight, high-leverage software. If your enterprise is constrained by manual data shuttling, isolated system silos, or inefficient AI workflows, we can design custom integrations that operate invisibly.</p>
            <a href="/#contact" class="btn btn--primary" style="margin-top: 20px;">Build Your Custom Solution</a>
        </div>
    </section>
</article>
@endsection
