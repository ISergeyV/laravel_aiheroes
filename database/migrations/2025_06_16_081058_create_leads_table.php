<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key for each lead
            $table->string('client_full_name'); // Full Name from form: fullName
            $table->string('client_phone')->nullable(); // Phone Number from form: phone
            $table->string('client_email')->nullable(); // Email Address from form: email
            $table->string('service_type'); // Type of Service from form: serviceType (required in form)
            $table->string('urgency_level'); // Urgency from form: urgency (renamed for clarity and snake_case)
            $table->text('job_description'); // Detailed Problem Description from form: jobDescription
            $table->string('estimated_budget')->nullable(); // Estimated Budget from form: budget (optional)
            $table->json('uploaded_files_urls')->nullable(); // URLs of uploaded photos/videos from form: fileUpload (stored as JSON array)
            $table->string('service_address'); // Service Address or Area from form: address (required in form)
            // Поле для согласия с дисклеймером. В БД мы просто фиксируем факт согласия.
            // $table->boolean('disclaimer_agreed')->default(false); // (Можно добавить, если нужно явно хранить согласие, но обычно достаточно, что форма не отправится без него)

            // Поля для CRM, не из формы, но важные для управления лидами
            $table->string('status')->default('new'); // Current status of the lead (e.g., 'new', 'in_progress', 'quoted', 'converted', 'rejected') [1, 2, 3]
            $table->text('internal_notes')->nullable(); // Internal notes for your team within the CRM
            $table->timestamps(); // Laravel's automatic `created_at` and `updated_at` fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
