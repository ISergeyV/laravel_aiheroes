<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handyman Service Online Estimate Request</title>
    <!-- Tailwind CSS for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Style for the file input button */
        .file-input-button {
            cursor: pointer;
            padding: 0.75rem 1rem;
            background-color: #4f46e5;
            color: white;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }

        .file-input-button:hover {
            background-color: #4338ca;
        }

        #fileName {
            margin-top: 0.5rem;
            font-style: italic;
            color: #6b7280;
        }
    </style>
</head>
<body class="bg-slate-100 antialiased">

<div class="container mx-auto px-4 py-8 md:py-16" id="freeOnlineEstimate">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="p-8">
            <!-- Form Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800">Request a Free Online Estimate</h1>
                <p class="mt-4 text-slate-600">
                    Fill out the form below for a preliminary estimate. For the most accurate assessment, please provide
                    details and upload photos of the project.
                </p>
            </div>

            <!-- Error message container -->
            <div id="formErrors" class="hidden mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <p><strong>Please correct the errors below:</strong></p>
                <ul id="errorList" class="list-disc list-inside mt-2"></ul>
            </div>


            <!-- Form Start -->
            <form id="estimateForm" action="{{ route('lead.submit') }}" method="POST"
                  enctype="multipart/form-data" novalidate>
                @csrf
                <!-- Section 1: Contact Information -->
                <fieldset class="mb-8">
                    <legend class="text-xl font-semibold text-slate-700 mb-4 border-b pb-2 w-full">1. Your Contact
                        Information
                    </legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="fullName" class="block text-sm font-medium text-slate-700 mb-1">Full
                                Name</label>
                            <input type="text" id="fullName" name="fullName"
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                   required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Phone
                                Number</label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                   required>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email
                            Address</label>
                        <input type="email" id="email" name="email"
                               class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                               required placeholder="you@example.com">
                    </div>
                </fieldset>

                <!-- Section 2: Job Details -->
                <fieldset class="mb-8">
                    <legend class="text-xl font-semibold text-slate-700 mb-4 border-b pb-2 w-full">2. Job Details
                    </legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="serviceType" class="block text-sm font-medium text-slate-700 mb-1">Type of
                                Service</label>
                            <select id="serviceType" name="serviceType"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                                <option value="" disabled selected>Select a service...</option>
                                <option value="general_repair">General Repair & Maintenance</option>
                                <option value="carpentry">Carpentry</option>
                                <option value="painting">Painting</option>
                                <option value="assembly">Furniture/Equipment Assembly</option>
                                <option value="drywall">Drywall & Plaster</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="urgency"
                                   class="block text-sm font-medium text-slate-700 mb-1">Urgency</label>
                            <select id="urgency" name="urgency"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                                <option value="flexible">Flexible / Within a few weeks</option>
                                <option value="soon">Soon / Within 1-2 weeks</option>
                                <option value="asap">As soon as possible</option>
                                <option value="emergency">Emergency</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="jobDescription" class="block text-sm font-medium text-slate-700 mb-1">Detailed
                            Problem Description</label>
                        <textarea id="jobDescription" name="jobDescription" rows="5"
                                  class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                  placeholder="Please describe the issue in detail. For example: 'My garbage disposal is making a humming noise but not spinning.' or 'I need three ceiling fans installed in rooms with existing light fixtures.'"
                                  required></textarea>
                    </div>
                    <div class="mt-6">
                        <label for="budget" class="block text-sm font-medium text-slate-700 mb-1">Estimated Budget
                            (Optional)</label>
                        <input type="text" id="budget" name="budget"
                               class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., 'around $500', or 'under $1000'">
                        <p class="text-xs text-slate-500 mt-1">Providing a budget helps us understand your
                            expectations, but it's not required.</p>
                    </div>
                </fieldset>

                <!-- Section 3: Photo/Video Upload -->
                <fieldset class="mb-8">
                    <legend class="text-xl font-semibold text-slate-700 mb-4 border-b pb-2 w-full">3. Upload Photos
                        / Video
                    </legend>
                    <div class="p-6 bg-indigo-50 border-2 border-dashed border-indigo-200 rounded-lg text-center">
                        <label for="fileUpload" class="file-input-button">
                            Choose Files
                        </label>
                        <input type="file" id="fileUpload" name="fileUpload[]" class="hidden" multiple
                               accept="image/*,video/*">
                        <p id="fileName" class="text-sm text-slate-500 mt-2">No files selected</p>
                        <p class="text-xs text-slate-500 mt-2">
                            For an accurate estimate, please upload photos showing the entire area and close-ups of
                            the problem. A short video is also very helpful. (Max 5 files, 25MB each)
                        </p>
                    </div>
                </fieldset>

                <!-- Section 4: Location -->
                <fieldset class="mb-8">
                    <legend class="text-xl font-semibold text-slate-700 mb-4 border-b pb-2 w-full">4. Service
                        Location
                    </legend>
                    <div>
                        <label for="address" class="block text-sm font-medium text-slate-700 mb-1">Service Address
                            or Area</label>
                        <input type="text" id="address" name="address"
                               class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="e.g., Irvine, CA 92618 or 123 Main St, Irvine" required>
                    </div>
                </fieldset>

                <!-- Section 5: Disclaimer and Agreement -->
                <fieldset>
                    <legend class="text-xl font-semibold text-slate-700 mb-4 border-b pb-2 w-full">5. Important
                        Disclaimers & Agreement
                    </legend>
                    <div
                        class="p-4 bg-slate-50 rounded-lg border border-slate-200 text-sm text-slate-600 space-y-2">
                        <p><strong>This is a Preliminary Estimate:</strong> The estimate provided online is a
                            preliminary calculation based solely on the information and photos you provide. It is
                            not a final or legally binding quote.</p>
                        <p><strong>On-Site Verification Required:</strong> The final cost is subject to change. A
                            firm, fixed-price quote can only be provided after a physical, on-site inspection to
                            assess the full scope of work, identify any unforeseen issues, and confirm measurements.
                        </p>
                        <p><strong>Factors Affecting Price:</strong> The final price may be affected by factors
                            including, but not limited to, changes in material costs, hidden damages (e.g., water
                            damage, pests, structural issues), code compliance requirements, or changes to the
                            project scope requested by you.</p>
                        <p><strong>On-Site Assessment Fee:</strong> For most projects, a detailed on-site assessment
                            is necessary. This visit is **free if you proceed with the quoted work**. If you decline
                            the quote after the on-site visit, a nominal service fee of $75 will be charged to cover
                            our time and travel expenses. This policy helps us focus on serious inquiries.</p>
                        <p><strong>Validity:</strong> All estimates and quotes are valid for 30 days from the date
                            of issue.</p>
                    </div>
                    <div class="mt-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="disclaimer" name="disclaimer" type="checkbox"
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                       required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="disclaimer" class="font-medium text-slate-700">I have read, understood,
                                    and agree to the terms and disclaimers above.</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Submit Button -->
                <div class="mt-10 text-center">
                    <button type="submit" id="submitButton"
                            class="w-full md:w-auto bg-indigo-600 text-white font-bold py-3 px-12 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105 disabled:bg-slate-400 disabled:cursor-not-allowed"
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
    document.addEventListener('DOMContentLoaded', function () {
        // --- Get all necessary elements from the page ---
        const form = document.getElementById('estimateForm');
        const submitButton = document.getElementById('submitButton');
        const formErrorsContainer = document.getElementById('formErrors');
        const errorList = document.getElementById('errorList');
        const disclaimerCheckbox = document.getElementById('disclaimer');
        const fileInput = document.getElementById('fileUpload');
        const fileNameDisplay = document.getElementById('fileName');

        // --- Logic to display the name of the selected file ---
        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files.length === 1
                    ? fileInput.files[0].name
                    : `${fileInput.files.length} files selected`;
            } else {
                fileNameDisplay.textContent = 'No files selected';
            }
        });

        // --- Logic to activate the submit button ---
        disclaimerCheckbox.addEventListener('change', function () {
            submitButton.disabled = !this.checked;
        });

        // --- MAIN FORM SUBMISSION HANDLER ---
        form.addEventListener('submit', async function (e) {
            // 1. Prevent the standard form submission (page reload)
            e.preventDefault();

            // 2. Improve UX: disable the button and show a loading state
            const originalButtonText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = 'Sending...'; // Changed to English

            // 3. Reset old validation errors before a new submission
            clearValidationErrors();

            // 4. Gather all form data, including files
            const formData = new FormData(form);

            try {
                // 5. Send data to the server using fetch (modern AJAX)
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                    },
                });

                // Get the response from the server as JSON
                const result = await response.json();

                // 6. Analyze the server response
                if (!response.ok) {
                    // Response code is NOT successful (e.g., 422 for validation error)
                    if (response.status === 422 && result.errors) {
                        displayValidationErrors(result.errors);
                    } else {
                        // Other server error types (500, 404, etc.)
                        alert(`Server error: ${result.message || 'Please try again.'}`);
                    }
                    submitButton.disabled = !disclaimerCheckbox.checked;
                    submitButton.innerHTML = originalButtonText;
                } else {
                    window.location.href = response.url;
                }

            } catch (error) {
                // 7. Handle network errors (no internet, server down)
                console.error('Fetch Error:', error);
                alert('Could not submit the form. Please check your internet connection and try again.');
            } finally {
                // 8. Regardless of the outcome, restore the button to its original state
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            }
        });

        // --- Helper Functions ---

        /**
         * Displays validation errors received from Laravel.
         * @param {Object} errors - Error object { fieldName: ['Error message'] }
         */
        function displayValidationErrors(errors) {
            // defensive check to prevent crash
            if (!formErrorsContainer || !errorList) return;

            errorList.innerHTML = ''; // Clear old list
            formErrorsContainer.style.display = 'block';

            for (const fieldName in errors) {
                const messages = errors[fieldName];
                const li = document.createElement('li');
                li.textContent = messages[0];
                errorList.appendChild(li);

                // Laravel returns "fileUpload.0" for file array errors. We need to handle this.
                const inputName = fieldName.split('.')[0];
                const input = form.querySelector(`[name^="${inputName}"]`);
                if (input) {
                    input.classList.add('border-red-500');
                    if (document.activeElement !== input) {
                        input.focus();
                    }
                }
            }
        }

        /**
         * Clears all error messages and highlights.
         */
        function clearValidationErrors() {
            // **FIX:** Add a check here. If the element doesn't exist, do nothing.
            if (formErrorsContainer) {
                formErrorsContainer.style.display = 'none';
            }
            if (errorList) {
                errorList.innerHTML = '';
            }

            form.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));
        }
    });
</script>

</body>
</html>
