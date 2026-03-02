<div class="container mx-auto px-4 py-8 md:py-16" id="freeOnlineEstimate" x-data="leadWizard()" @open-estimate-modal.window="if($event.detail.email) { formData.email = $event.detail.email; }">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-[0_12px_24px_rgba(0,0,0,0.05)] border border-slate-100 overflow-hidden relative min-h-[400px]">
        
        <!-- Progress Bar -->
        <div class="w-full bg-slate-100 h-2 absolute top-0 left-0">
            <div class="bg-indigo-600 h-2 transition-all duration-500 ease-out" 
                 :style="'width: ' + ((step / 4) * 100) + '%'"></div>
        </div>

        <div class="p-8 md:p-12 relative">
            
            <!-- STEP 1: Email Hook -->
            <div x-show="step === 1" x-transition.opacity.duration.300ms>
                <div class="text-center mb-10 max-w-2xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Let's estimate your AI project</h2>
                    <p class="text-slate-600 text-[1.1rem]">Provide as much detail as possible so our AI can prepare a preliminary assessment. Enter your email to begin.</p>
                </div>
                
                <form @submit.prevent="submitStep1" class="max-w-xl mx-auto">
                    <!-- Pill Shaped Container -->
                    <div class="flex flex-col sm:flex-row items-center p-2 bg-white rounded-full shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-slate-100 max-w-lg mx-auto">
                        <div class="flex-grow w-full sm:w-auto px-6 py-2">
                            <label for="wizard_email" class="sr-only">Work Email</label>
                            <input type="email" id="wizard_email" x-model="formData.email" required 
                                   class="w-full bg-transparent border-none focus:ring-0 outline-none text-slate-800 placeholder:text-slate-400 text-lg"
                                   placeholder="Enter your email">
                        </div>
                        <div class="w-full sm:w-auto mt-2 sm:mt-0">
                            <button type="submit" :disabled="isSubmitting" style="background-color: #84cc16; color: #ffffff; padding: 12px 32px;"
                                    class="w-full sm:w-auto inline-flex items-center justify-center rounded-full font-bold text-lg transition-all duration-300 shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed hover:-translate-y-[2px]">
                                <span x-show="!isSubmitting">Get an Estimate</span>
                                <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-sm mt-4 text-center" x-cloak></p>
                </form>
            </div>

            <!-- STEP 2: Service Selection (Cards) -->
            <div x-show="step === 2" x-transition.opacity.duration.300ms x-cloak>
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-2">What can we build for you?</h2>
                    <p class="text-slate-600">Select the primary service you are interested in.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-3xl mx-auto">
                    <template x-for="service in services" :key="service.id">
                        <button type="button" @click="selectService(service.id)"
                                :class="{'ring-2 ring-indigo-500 shadow-md bg-white': formData.serviceType === service.id, 'shadow-sm bg-slate-50 border border-slate-100 hover:bg-white hover:border-slate-200 hover:shadow-md': formData.serviceType !== service.id}"
                                class="flex items-center p-5 rounded-2xl transition-all duration-200 cursor-pointer text-left group">
                            <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center transition-colors mr-4"
                                 :class="{'bg-indigo-100 text-indigo-600': formData.serviceType === service.id, 'bg-white text-slate-500 shadow-sm border border-slate-100 group-hover:text-indigo-600': formData.serviceType !== service.id}" x-html="service.icon"></div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-[1.05rem]" x-text="service.title"></h3>
                                <p class="text-sm text-slate-500 mt-1" x-text="service.desc"></p>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 3: Details & Budget -->
            <div x-show="step === 3" x-transition.opacity.duration.300ms x-cloak>
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-2">Project Details</h2>
                    <p class="text-slate-600">Give us a little more context about your needs.</p>
                </div>
                
                <form @submit.prevent="submitStep3" class="max-w-2xl mx-auto">
                    <div class="mb-8">
                        <label for="wizard_description" class="block text-[1.05rem] font-medium text-slate-800 mb-3">Requirements</label>
                        <textarea id="wizard_description" x-model="formData.jobDescription" rows="5" required
                                  :placeholder="getPlaceholder()"
                                  class="w-full px-5 py-4 bg-white border border-solid border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400 shadow-sm"></textarea>
                    </div>

                    <div class="mb-10">
                        <label class="block text-[1.05rem] font-medium text-slate-800 mb-3">Estimated Budget</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <template x-for="b in budgetOptions" :key="b">
                                <button type="button" @click="formData.budget = b"
                                        :class="{'bg-indigo-600 text-white border-indigo-600 shadow-md ring-2 ring-indigo-500/30': formData.budget === b, 'bg-white text-slate-700 border-slate-200 hover:border-indigo-300 hover:shadow-md shadow-sm': formData.budget !== b}"
                                        class="px-4 py-3 border border-solid rounded-xl font-medium transition-all duration-200 w-full text-center"
                                        x-text="b"></button>
                            </template>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-t border-slate-100 pt-8 mt-4">
                        <button type="button" @click="step = 2" class="px-6 py-3 font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-full transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back
                        </button>
                        <button type="submit" :disabled="isSubmitting" style="padding: 12px 40px;"
                                class="inline-flex items-center justify-center rounded-full font-bold text-lg transition-all duration-300 bg-slate-900 text-white hover:bg-slate-800 hover:-translate-y-[2px] shadow-md disabled:opacity-50 disabled:cursor-not-allowed">
                            <span x-show="!isSubmitting">Continue</span>
                            <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- STEP 4: Final Info & Files -->
            <div x-show="step === 4" x-transition.opacity.duration.300ms x-cloak>
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-2">Final Step</h2>
                    <p class="text-slate-600">Where should we send the estimate?</p>
                </div>

                <form @submit.prevent="submitFinalStep" class="max-w-2xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="wizard_name" class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                            <input type="text" id="wizard_name" x-model="formData.fullName" required
                                   class="w-full px-5 py-4 bg-white border border-solid border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400 shadow-sm appearance-none"
                                   placeholder="John Doe">
                        </div>
                        <div>
                            <label for="wizard_phone" class="block text-sm font-medium text-slate-700 mb-1.5">Phone Number (Optional)</label>
                            <input type="tel" id="wizard_phone" x-model="formData.phone"
                                   class="w-full px-5 py-4 bg-white border border-solid border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400 shadow-sm appearance-none"
                                   placeholder="+1 (555) 000-0000">
                        </div>
                    </div>
                    
                    <div class="mb-8">
                        <label for="wizard_company" class="block text-sm font-medium text-slate-700 mb-1.5">Company Name or Website</label>
                        <input type="text" id="wizard_company" x-model="formData.companyWebsite" required
                                   class="w-full px-5 py-4 bg-white border border-solid border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400 shadow-sm appearance-none"
                                   placeholder="e.g., aiheroes.net">
                    </div>

                    <div class="p-8 bg-slate-50/50 border-2 border-dashed border-slate-200 rounded-xl text-center hover:bg-slate-50 transition-colors mb-8">
                        <label for="wizard_files" class="inline-flex items-center justify-center px-8 py-3 border border-indigo-200 shadow-sm text-base font-bold rounded-xl text-indigo-700 bg-indigo-50 hover:bg-indigo-100 focus:outline-none cursor-pointer transition-colors w-full sm:w-auto">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                            Attach Files
                        </label>
                        <input type="file" id="wizard_files" class="hidden" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,image/*" @change="updateFileCount($event)">
                        <p class="text-sm text-slate-500 mt-2"><span x-text="fileCount">0</span> files selected</p>
                    </div>

                    <div class="flex justify-between items-center border-t border-slate-100 pt-8 mt-4">
                        <button type="button" @click="step = 3" class="px-6 py-3 font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-full transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back
                        </button>
                        <button type="submit" :disabled="isSubmitting" style="padding: 14px 48px;"
                                class="inline-flex items-center justify-center rounded-full font-bold text-xl transition-all duration-300 bg-gradient-to-br from-indigo-600 to-pink-500 text-white shadow-lg border border-white/10 hover:from-indigo-700 hover:to-pink-600 hover:shadow-xl hover:-translate-y-[2px] disabled:opacity-50 disabled:cursor-not-allowed">
                            <span x-show="!isSubmitting">Get My Estimate</span>
                            <span x-show="isSubmitting" class="flex items-center gap-2" x-cloak>
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- STEP 5: Success State -->
            <div x-show="step === 5" x-transition.opacity.duration.300ms x-cloak>
                <div class="text-center py-10">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-800 mb-4">You're All Set!</h2>
                    <p class="text-lg text-slate-600 mb-8 max-w-lg mx-auto">Your estimate request has been submitted successfully. Our AI experts will review your details and get back to you within 1-2 business days with a preliminary assessment.</p>
                    <button @click="$dispatch('close-estimate-modal'); setTimeout(() => { step = 1; formData.jobDescription = ''; formData.budget = ''; formData.serviceType = ''; formData.email = ''; formData.fullName = ''; formData.companyWebsite = ''; formData.phone = ''; }, 300)" type="button" class="inline-flex justify-center w-full sm:w-auto px-8 py-3 bg-slate-900 border border-transparent rounded-full shadow-sm text-base font-medium text-white hover:bg-slate-800 transition-colors">
                        Close & Return to Homepage
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('leadWizard', () => ({
        step: 1,
        sessionToken: null,
        isSubmitting: false,
        fileCount: 0,
        errors: {},
        
        formData: {
            email: '',
            serviceType: '',
            jobDescription: '',
            budget: '',
            fullName: '',
            companyWebsite: '',
            phone: ''
        },
        
        budgetOptions: ['< $1k', '$1k - $5k', '$5k - $10k', '$10k+'],
        
        services: [
            { id: 'web_app_dev', title: 'Web App', desc: 'Custom portals & web apps', icon: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>' },
            { id: 'workspace_automation', title: 'Workspace', desc: 'Google Workspace automation', icon: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>' },
            { id: 'browser_automation', title: 'Browser Scripts', desc: 'Data scraping & extraction', icon: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>' },
            { id: 'ai_ml', title: 'AI & ML', desc: 'LLM agents & models', icon: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>' },
            { id: 'n8n_automation', title: 'n8n Workflows', desc: 'API & webhooks integrations', icon: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>' },
            { id: 'data_analytics', title: 'Data Analytics', desc: 'BI & visualizations', icon: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>' },
        ],
        
        getPlaceholder() {
            switch(this.formData.serviceType) {
                case 'web_app_dev': return "Do you have existing designs? What features are a must-have?";
                case 'n8n_automation': return "Which tools need to be connected (e.g. Gmail to Slack)?";
                case 'ai_ml': return "What kind of data do you want the AI to analyze?";
                default: return "Describe your goals and the current problem you're facing...";
            }
        },
        
        updateFileCount(e) {
            this.fileCount = e.target.files.length;
        },
        
        selectService(id) {
            this.formData.serviceType = id;
            this.submitStep2();
        },
        
        async submitStep1() {
            this.isSubmitting = true;
            this.errors = {};
            
            try {
                const res = await fetch('/api/leads/start', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify({ email: this.formData.email })
                });
                const data = await res.json();
                
                if (res.ok && data.success) {
                    this.sessionToken = data.session_token;
                    this.step = 2;
                } else {
                    this.errors.email = data.message || "Failed to start. Please try again.";
                }
            } catch (err) {
                this.errors.email = "Network error. Please try again.";
            } finally {
                this.isSubmitting = false;
            }
        },
        
        async submitStep2() {
            if (!this.formData.serviceType) return;
            this.isSubmitting = true;
            
            try {
                const res = await fetch('/api/leads/update', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify({
                        session_token: this.sessionToken,
                        serviceType: this.formData.serviceType
                    })
                });
                if (res.ok) {
                    this.step = 3;
                }
            } catch (err) {
                console.error(err);
            } finally {
                this.isSubmitting = false;
            }
        },
        
        async submitStep3() {
            if (!this.formData.jobDescription) return;
            this.isSubmitting = true;
            
            try {
                const res = await fetch('/api/leads/update', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify({
                        session_token: this.sessionToken,
                        jobDescription: this.formData.jobDescription,
                        budget: this.formData.budget
                    })
                });
                if (res.ok) {
                    this.step = 4;
                }
            } catch (err) {
                console.error(err);
            } finally {
                this.isSubmitting = false;
            }
        },
        
        async submitFinalStep() {
            this.isSubmitting = true;
            
            const fd = new FormData();
            fd.append('session_token', this.sessionToken);
            fd.append('fullName', this.formData.fullName);
            fd.append('companyWebsite', this.formData.companyWebsite);
            fd.append('phone', this.formData.phone);
            
            const fileInput = document.getElementById('wizard_files');
            if (fileInput && fileInput.files.length > 0) {
                for (let i = 0; i < fileInput.files.length; i++) {
                    fd.append(`fileUpload[${i}]`, fileInput.files[i]);
                }
            }
            
            try {
                const res = await fetch('/api/leads/complete', {
                    method: 'POST',
                    headers: { 'Accept': 'application/json' },
                    body: fd
                });
                const data = await res.json();
                
                if (res.ok && data.success) {
                    this.step = 5; // Show inline success state
                } else {
                    alert(data.message || 'An error occurred.');
                }
            } catch (err) {
                alert('Network error. Please try again.');
                console.error(err);
            } finally {
                this.isSubmitting = false;
            }
        }
    }));
});
</script>
