<!-- Anti-bot protection script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obfuscated parts to prevent simple scraping
        const parts = {
            u: 'info',
            d: 'aiheroes.net',
            p1: '714',
            p2: '759',
            p3: '2071',
            c: '1'
        };

        // Reconstruct email
        const email = `${parts.u}@${parts.d}`;
        const emailLinks = document.querySelectorAll('.js-email-link');
        emailLinks.forEach(link => {
            link.href = `mailto:${email}`;
            link.innerText = email;
        });

        // Reconstruct phone
        const phoneDisplay = `+${parts.c} (${parts.p1}) ${parts.p2}-${parts.p3}`;
        const phoneLink = `+${parts.c}${parts.p1}${parts.p2}${parts.p3}`;
        const phoneLinks = document.querySelectorAll('.js-phone-link');
        phoneLinks.forEach(link => {
            link.href = `tel:${phoneLink}`;
            link.innerText = phoneDisplay;
        });
    });
</script>
