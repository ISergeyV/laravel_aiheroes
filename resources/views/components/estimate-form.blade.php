{{-- resources/views/components/estimate-form.blade.php --}}

<div class="container mx-auto px-4 py-8 md:py-16" id="freeOnlineEstimate">
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-[0_12px_24px_rgba(0,0,0,0.05)] border border-slate-100 overflow-hidden">
        <div class="p-8">
            <!-- Form Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800">Request a Free AI Solutions Estimate</h1>
                <p class="mt-4 text-slate-600">
                    Fill out the form below to help us understand your business needs. Provide as much detail as possible so our AI can prepare a preliminary assessment.
                </p>
            </div>

            <!-- Laravel Validation Errors -->
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <p><strong>Please correct the errors below:</strong></p>
                    <ul class="list-disc list-inside mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Start -->
            <form id="estimateForm" action="{{ route('lead.submit') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <!-- Section 1: Contact Information -->
                <fieldset class="mb-10 border-none p-0 m-0">
                    <legend class="text-[1.15rem] font-semibold text-slate-800 mb-6 border-b border-slate-100 pb-3 w-full">1. Your Contact
                        Information
                    </legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="fullName" class="block text-sm font-medium text-slate-700 mb-1.5">Full
                                Name</label>
                            <input type="text" id="fullName" name="fullName" autocomplete="name" value="{{ old('fullName') }}"
                                   class="w-full px-4 py-3 bg-slate-50/50 border @error('fullName') border-red-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">Phone
                                Number</label>
                            <input type="tel" id="phone" name="phone" autocomplete="tel" value="{{ old('phone') }}"
                                   class="w-full px-4 py-3 bg-slate-50/50 border @error('phone') border-red-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400"
                                   required>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email
                            Address</label>
                        <input type="email" id="email" name="email" autocomplete="email" value="{{ old('email') }}"
                               class="w-full px-4 py-3 bg-slate-50/50 border @error('email') border-red-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400"
                                placeholder="you@example.com">
                    </div>
                </fieldset>

                <!-- Section 2: Job Details -->
                <fieldset class="mb-10 border-none p-0 m-0">
                    <legend class="text-[1.15rem] font-semibold text-slate-800 mb-6 border-b border-slate-100 pb-3 w-full">2. Job Details
                    </legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="serviceType" class="block text-sm font-medium text-slate-700 mb-1.5">Type of
                                Service</label>
                            <select id="serviceType" name="serviceType"
                                    class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800">
                                <option value="" disabled selected>Select a service...</option>
                                <option value="web_app_dev">Web App Development</option>
                                <option value="workspace_automation">Google Workspace Automation</option>
                                <option value="browser_automation">Browser & Data Processing</option>
                                <option value="ai_ml">AI & Machine Learning</option>
                                <option value="n8n_automation">n8n Workflow Automation</option>
                                <option value="data_analytics">Data Analytics</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="urgency"
                                   class="block text-sm font-medium text-slate-700 mb-1.5">Urgency</label>
                            <select id="urgency" name="urgency"
                                    class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800">
                                <option value="flexible">Flexible / Within a few weeks</option>
                                <option value="soon">Soon / Within 1-2 weeks</option>
                                <option value="asap">As soon as possible</option>
                                <option value="emergency">Emergency</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="jobDescription" class="block text-sm font-medium text-slate-700 mb-1.5">Detailed
                            Project Requirements</label>
                        <textarea id="jobDescription" name="jobDescription" rows="5"
                                  class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400"
                                  placeholder="Please describe your needs in detail. For example: 'We currently process 100 invoices a day manually and need an n8n workflow to extract data using AI and put it into Monday.com.'"
                                  ></textarea>
                    </div>
                    <div class="mt-6">
                        <label for="budget" class="block text-sm font-medium text-slate-700 mb-1.5">Estimated Budget
                            (Optional)</label>
                        <input type="text" id="budget" name="budget"
                               class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400"
                               placeholder="e.g., 'around $500', or 'under $1000'">
                        <p class="text-xs text-slate-500 mt-1">Providing a budget helps us understand your
                            expectations, but it's not required.</p>
                    </div>
                </fieldset>

                <!-- Section 3: Document Upload -->
                <fieldset class="mb-10 border-none p-0 m-0">
                    <legend class="text-[1.15rem] font-semibold text-slate-800 mb-6 border-b border-slate-100 pb-3 w-full">3. Upload Documents
                        / References
                    </legend>
                    <div class="p-8 bg-slate-50/50 border-2 border-dashed border-slate-200 rounded-xl text-center hover:bg-slate-50 transition-colors">
                        <label for="fileUpload" class="inline-flex items-center justify-center px-6 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer transition-colors">
                            Choose Files
                        </label>
                        <input type="file" id="fileUpload" name="fileUpload[]" class="hidden" multiple
                               accept=".pdf,.doc,.docx,.xls,.xlsx,image/*,video/*">
                        <p id="fileName" class="text-sm text-slate-500 mt-2">No files selected</p>
                        <p class="text-xs text-slate-500 mt-2">
                            Please upload any wireframes, current process diagrams, or reference documents that will help us understand your project. (Max 5 files, 25MB each)
                        </p>
                    </div>
                </fieldset>

                <!-- Section 4: Company Info -->
                <fieldset class="mb-10 border-none p-0 m-0">
                    <legend class="text-[1.15rem] font-semibold text-slate-800 mb-6 border-b border-slate-100 pb-3 w-full">4. Company
                        Details
                    </legend>
                    <div>
                        <label for="companyWebsite" class="block text-sm font-medium text-slate-700 mb-1.5">Company Name
                            or Website</label>
                        <input type="text" id="companyWebsite" name="companyWebsite" autocomplete="organization"
                               value="{{ old('companyWebsite') }}"
                               class="w-full px-4 py-3 bg-slate-50/50 border @error('companyWebsite') border-red-500 @else border-slate-200 @enderror rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-200 outline-none text-slate-800 placeholder:text-slate-400"
                               placeholder="e.g., AI Heroes (aiheroes.net)" >
                    </div>
                </fieldset>

                {{-- resources/views/components/estimate-form.blade.php --}}

                <!-- Section 5: Disclaimer and Agreement (IMPROVED) -->
                <fieldset x-data="{ open: false }" class="border-none p-0 m-0">
                    <legend class="text-[1.15rem] font-semibold text-slate-800 mb-6 border-b border-slate-100 pb-3 w-full">5. Agreement</legend>

                    {{-- Скрытый блок с деталями, который будет раскрываться --}}
                    <div x-show="open" x-collapse x-cloak
                         class="p-4 bg-slate-50 rounded-lg border border-slate-200 text-sm text-slate-600 space-y-2 mb-4">
                        <p><strong>Preliminary Assessment:</strong> This is a preliminary calculation based on the
                            information you provide, not a final quote.</p>
                        <p><strong>Discovery Meeting:</strong> A firm, fixed-price quote can only be provided after a detailed
                            technical discovery meeting to assess the full scope of work.</p>
                        <p><strong>Factors Affecting Price:</strong> The final price may be affected by legacy code 
                            integration, third-party API limits, or changes to the project scope.</p>
                        <p><strong>Consultation fee:</strong> Our initial consultation is free. If a deep architectural 
                            assessment is required, a nominal fee may apply, which will be credited toward the final project.</p>
                        <p><strong>Validity:</strong> All quotes are valid for 30 days.</p>
                    </div>

                    {{-- Чекбокс и ссылка для раскрытия/скрытия --}}
                    <div class="mt-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="disclaimer" name="disclaimer" type="checkbox"
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                       required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="disclaimer" class="font-medium text-slate-700">I agree to the terms of the
                                    estimate
                                    policy.</label>
                                {{-- Ссылка-триггер для аккордеона --}}
                                 <span @click="open = !open"
                                       class="ml-2 text-indigo-600 hover:text-indigo-800 cursor-pointer underline text-xs transition-colors">(View Details)</span>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Submit Button -->
                <div class="mt-12 text-center border-t border-slate-100 pt-8">
                    <button type="submit" id="submitButton"
                            class="inline-flex w-full md:w-auto items-center justify-center px-12 h-14 rounded-full font-medium transition-all duration-300 bg-gradient-to-br from-indigo-600 to-pink-500 text-white shadow-[0_4px_6px_-1px_rgba(79,70,229,0.4)] border border-white/10 hover:from-indigo-700 hover:to-pink-600 hover:shadow-[0_10px_15px_-3px_rgba(79,70,229,0.5)] hover:-translate-y-[2px] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 disabled:hover:shadow-none"
                            disabled>
                        Get My Free Estimate
                    </button>
                </div>
            </form>
            <!-- End Form -->

        </div>
    </div>
</div>

<script>
    // Ждем, пока вся HTML-структура страницы будет загружена
    document.addEventListener('DOMContentLoaded', function () {

        // Находим ключевые элементы формы по их ID
        const submitButton = document.getElementById('submitButton');
        const disclaimerCheckbox = document.getElementById('disclaimer');
        const fileInput = document.getElementById('fileUpload');
        const fileNameDisplay = document.getElementById('fileName');

        // --- Логика для отображения имен выбранных файлов ---
        fileInput.addEventListener('change', function () {
            const numFiles = fileInput.files.length;
            if (numFiles > 0) {
                // Если выбран один файл, показать его имя. Если несколько - показать количество.
                fileNameDisplay.textContent = numFiles === 1
                    ? fileInput.files[0].name
                    : `${numFiles} files selected`;
            } else {
                fileNameDisplay.textContent = 'No files selected';
            }
        });

        // --- КЛЮЧЕВАЯ ЛОГИКА: Активация кнопки отправки ---
        // Проверяем, существует ли чекбокс, чтобы избежать ошибок
        if (disclaimerCheckbox) {
            // Добавляем "слушателя" на событие 'change' (клик по чекбоксу)
            disclaimerCheckbox.addEventListener('change', function () {
                // Устанавливаем свойство 'disabled' кнопки в противоположное
                // значение состояния чекбокса (отмечен/не отмечен).
                submitButton.disabled = !this.checked;
            });
        }
    });
</script>
