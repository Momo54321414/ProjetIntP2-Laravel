<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        
    //  $trigger = 'CREATE TRIGGER trigger_create_calendar_assoc_prescription AFTER INSERT ON `prescriptions` FOR EACH ROW
    //     BEGIN
    //         INSERT INTO `calendars` (`dateAndHour`, `created_at`, `updated_at`) VALUES (NEW.dateOfStart, NOW(), NOW());
    //     END';

    //     DB::unprepared($trigger);
    //     echo 'Trigger created successfully.';

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_trigger');
    }
};
