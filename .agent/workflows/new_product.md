---
description: Generate a high-conversion professional case study from a GitHub URL.
---

# Workflow: Deploy New Product to Website
Input: {{repo_url}}

Act as a Senior Full-stack Developer (PHP/Laravel/Tailwind). 
Your goal: Analyze the provided GitHub repository and INTEGRATE it into the current Laravel codebase as a new project showcase.

STEPS:
1. ANALYZE REPO: Analyze {{repo_url}} to understand its business value and tech stack.
2. LOCATE PATTERN: Find the existing "Production-Ready Data Migration System" in the codebase (likely in resources/views/...).
3. GENERATE CONTENT: Create the "Project Showcase" text in English (High-End Agency style).
4. EXECUTE FILE CHANGES:
   - Create a new Blade file (e.g., `resources/views/projects/ask-chatgpt.blade.php`) following the existing design pattern.
   - Update the main projects list (e.g., in `welcome.blade.php`) by adding a new card/section with a link to the new project.
   - If a new route is required, update `routes/web.php`.
5. VERIFY: Ensure Tailwind classes and layout consistency match the rest of the site.

TONE: Professional, precise, and results-driven.