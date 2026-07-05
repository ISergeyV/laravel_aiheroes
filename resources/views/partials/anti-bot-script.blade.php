@inject('siteSettings', 'App\Settings\SiteSettings')
<!-- Anti-bot protection script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Base64 encoded to prevent simple scraping
        const encodedEmail = '{{ base64_encode($siteSettings->contact_email) }}';
        const encodedPhone = '{{ base64_encode($siteSettings->contact_phone) }}';
        
        if (encodedEmail) {
            const email = atob(encodedEmail);
            const emailLinks = document.querySelectorAll('.js-email-link');
            emailLinks.forEach(link => {
                link.href = `mailto:${email}`;
                link.innerText = email;
            });
        }

        if (encodedPhone) {
            let phoneDisplay = atob(encodedPhone);
            // Clean phone number for the tel: link
            const phoneLink = phoneDisplay.replace(/[^0-9+]/g, '');
            
            // Format phone beautifully if it looks like a standard US 10 or 11 digit number
            const digitsOnly = phoneDisplay.replace(/\D/g, '');
            if (digitsOnly.length === 10) {
                phoneDisplay = `+1 (${digitsOnly.substring(0,3)}) ${digitsOnly.substring(3,6)}-${digitsOnly.substring(6)}`;
            } else if (digitsOnly.length === 11 && digitsOnly.startsWith('1')) {
                phoneDisplay = `+1 (${digitsOnly.substring(1,4)}) ${digitsOnly.substring(4,7)}-${digitsOnly.substring(7)}`;
            }

            const phoneLinks = document.querySelectorAll('.js-phone-link');
            phoneLinks.forEach(link => {
                link.href = `tel:${phoneLink}`;
                link.innerText = phoneDisplay;
            });
        }
    });
</script>
